<?php

namespace App\Voyager\Providers;

use Voyager;

use App\Voyager\Actions\ShowLink;
use App\Voyager\Widgets\VideoWidgetHandler;
use App\Voyager\Widgets\BannerWidgetHandler;
use App\Voyager\Widgets\СounterWidgetHandler;
use App\Voyager\Widgets\ContactsWidgetHandler;
use App\Voyager\Widgets\MainGalleryWidgetHandler;
use App\Voyager\FormFields\StarsFormField;
use App\Voyager\FormFields\WorkExperienceFormField;

use Illuminate\Support\ServiceProvider;

class VoyagerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerActions();
        $this->registerWidgets();
        $this->registerFormFields();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function registerActions()
    {
        Voyager::addAction(ShowLink::class);
    }
    public function registerWidgets()
    {
        Voyager::addWidgetHandler(VideoWidgetHandler::class);
        Voyager::addWidgetHandler(BannerWidgetHandler::class);
        Voyager::addWidgetHandler(СounterWidgetHandler::class);
        Voyager::addWidgetHandler(ContactsWidgetHandler::class);
        Voyager::addWidgetHandler(MainGalleryWidgetHandler::class);
    }
      /**
     * FormFields
     */
    protected function registerFormFields()
    {
        Voyager::addFormField(StarsFormField::class);
        Voyager::addFormField(WorkExperienceFormField::class);
    }
}
