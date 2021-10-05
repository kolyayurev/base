<?php

namespace App\Providers;

use Voyager;

use Str;

use TCG\Voyager\Models\Page;

use Butschster\Head\Contracts\Packages\PackageInterface;
use Butschster\Head\Facades\PackageManager;
use Butschster\Head\MetaTags\Meta;
use Butschster\Head\MetaTags\Entities\Tag;
use Butschster\Head\MetaTags\Entities\Webmaster;
use Butschster\Head\Contracts\MetaTags\MetaInterface;
use Butschster\Head\Contracts\Packages\ManagerInterface;
use Butschster\Head\Providers\MetaTagsApplicationServiceProvider as ServiceProvider;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;
use Butschster\Head\MetaTags\Entities\YandexMetrika;


class MetaTagsServiceProvider extends ServiceProvider
{
    protected function packages()
    {
        $this->macros();
    }

    // if you don't want to change anything in this method just remove it
    protected function registerMeta(): void
    {
        $this->app->singleton(MetaInterface::class, function () {
            $meta = new Meta(
                $this->app[ManagerInterface::class],
                $this->app['config']
            );
            $meta->setCharset();
            $meta->addCsrfToken();
            $meta->setViewport('width=device-width, initial-scale=1.0');

            $meta->setTitleSeparator('I');
            $meta->setTitle(setting('seo.meta_title'));
            $meta->setDescription(setting('seo.meta_description'));
            $meta->setKeywords(setting('seo.meta_keywords'));

            $meta->setCanonical(build_canonical(true));
            // It just an imagination, you can automatically
            // add favicon if it exists
            // if (file_exists(public_path('favicon.ico'))) {
            //    $meta->setFavicon('/favicon.ico');
            // }

            // This method gets default values from config and creates tags, includes default packages, e.t.c
            // If you don't want to use default values just remove it.
            // $meta->initialize();
            /**
             * OpenGraph
             */
            $og = new OpenGraphPackage('OpenGraph');

            $og->setType('website')
                ->setSiteName(setting('seo.meta_title')??'')
                ->setTitle(strip_tags($meta->getTitle()))
                ->setDescription(setting('seo.meta_description',''))
                ->setUrl(build_canonical(true))
                ->setLocale('ru_RU')
                ->addImage(Voyager::image(setting('seo.logo')));

            $meta->registerPackage($og);

            /**
             * TwitterCard
             */
            $card = new TwitterCardPackage('TwitterCard');

            $card->setType('summary')
                ->setSite('@'.setting('seo.twitter_name'))
                ->setCreator('@'.setting('seo.twitter_name'))
                ->setTitle(strip_tags($meta->getTitle()))
                ->addImage(Voyager::image(setting('seo.logo')));

            $meta->registerPackage($card);

            /**
             * Webmasters
             */
            // if(!empty( setting('seo.yandex_verification')))
            // $meta->addWebmaster('yandex', setting('seo.yandex_verification'));

            // if(!empty( setting('seo.yandex_metrica')))
            // {
            //     $script = new YandexMetrika(setting('seo.yandex_metrica'));
            //     $meta->addTag('yandex.metrika', $script);
            // }

            // $meta->addWebmaster(Webmaster::GOOGLE, 'voMn2GBB8GxNWkVGIPCA0de8qu2o8rRopYi9Rr7fAcA');

            // $data = [
            //     "name"=> setting('site.title'),
            //     "url"=> url('/'),
            //     "logo"=> Voyager::image(setting('seo.logo')),
            //     "image"=> Voyager::image(setting('seo.logo')),
            //     "description"=> setting('seo.meta_description'),
            //     "contactPoint"=> [
            //         "telephone"=> setting('kontakty.phone')
            //     ]
            // ];

            // jsonld(Organization::class,$data);

            return $meta;
        });
    }

    private function macros(){
        Meta::macro('registerSeoMetaTagsForPage', function (Page $page) {
            
            $url = \Route::has('page.'.$page->slug)? route('page.'.$page->slug) :build_canonical(true);
            $this->prependTitle($page->getMetaTitle());
            if($page->getMetaDescription())
                $this->setDescription($page->getMetaDescription());

            $this
                ->setCanonical($url)
                ->setKeywords($page->getKeywords());

            $og = new OpenGraphPackage('OpenGraphPage');

            $og
                ->setTitle(strip_tags($this->getTitle()??''))
                ->setUrl($url);

            if($page->getMetaDescription())
                $og->setDescription($page->getMetaDescription());
            if($page->image_path)
                $og->addImage($page->image_path);

            $this->registerPackage($og);

            /**
             * TwitterCard
             */
            $card = new TwitterCardPackage('TwitterCardPage');

            if($page->image_path)
                $card->addImage($page->image_path);

            $this->registerPackage($card);
            // dump('page',$this);
        });


    }

}
