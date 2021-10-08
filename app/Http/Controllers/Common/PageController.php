<?php

namespace App\Http\Controllers\Common;

use Meta;
use View;
use Cache;

use App\Models\Page;
use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private $faqRepository;
    private $pageRepository;

    protected $excludePages = ['home'];

    public function __construct(
        PageRepository $pageRepository
        )
    {
        $this->pageRepository        = $pageRepository;
    }

    public function getExcludePages(){
        return $this->excludePages;
    }
    
    public function home(Request $request)
    {
        $page = $this->getPage('home');

        Meta::registerSeoMetaTagsForPage($page);

        return view('public.pages.home',compact('page'));
    }


    public function page(Request $request,$slug)
    {
        if(in_array($slug, $this->excludePages) && \Route::has('page.'.$slug))
            return redirect()->route('page.'.$slug);

        return $this->simplePage($slug);
    }

    protected function simplePage($slug){
        $page = $this->getPage($slug);

        Meta::registerSeoMetaTagsForPage($page);

        if(View::exists('public.pages.'.$slug))
            return view('public.pages.'.$slug,compact('page'));
        else
            return  view('public.pages.show',compact('page')); ;
    }

    protected function getPage($slug){

        $page = $this->pageRepository->getActiveBySlug($slug);
        // Cache::remember('page.'.$slug, 1, function () use ($slug){
        //     return $this->pageRepository->getActiveBySlug($slug);
        // });

        if(empty($page))
            abort(404);

        return $page;
    }
}
