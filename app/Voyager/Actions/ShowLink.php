<?php

namespace App\Voyager\Actions;

use TCG\Voyager\Actions\AbstractAction;

class ShowLink extends AbstractAction
{
    
    public function getTitle()
    {
        return 'Страница';
    }

    public function getIcon()
    {
        return 'voyager-eye';
    }

    public function getPolicy()
    {
        return 'browse';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-success pull-right open',
        ];
    }

    public function getDefaultRoute()
    {   

        return route("{$this->dataType->slug}.show",$this->data->slug);
    }

    public function shouldActionDisplayOnDataType()
    {
        return in_array($this->dataType->slug, ['services','doctors','news-stocks','pages','articles']);
    }

}