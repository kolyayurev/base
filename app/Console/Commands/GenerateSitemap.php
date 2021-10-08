<?php

namespace App\Console\Commands;

use App\Models\Service;
use App\Http\Controllers\Common\PageController;


use Carbon\Carbon;
use TCG\Voyager\Models\Page;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;

use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate  
                            {--domain= : Site domain}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       
        $sitemap = Sitemap::create();
        /**
         * Pages
         */
        $sitemap->add(Url::create(route('page.home'))->setPriority(1.0)->setLastModificationDate(Carbon::now()));

        $pages = Page::whereNotIn('slug',app(PageController::class)->getExcludePages())->visible()->get();
        foreach ($pages as $page) {
            $sitemap->add(Url::create(route('pages.show',['slug'=>$page->slug]))->setLastModificationDate(Carbon::parse($page->updated_at)));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        return 'Sitemap generated!';
    }
}
