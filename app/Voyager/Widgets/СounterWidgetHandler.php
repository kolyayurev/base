<?php

namespace App\Voyager\Widgets;

use TCG\Voyager\Widgets\BaseWidgetHandler;
use Illuminate\Http\Request;

class СounterWidgetHandler extends BaseWidgetHandler
{

    
    public function __construct()
    {
        $this->view = 'voyager::widgets.widgets.counter';
        $this->name = 'counter';
        $this->codename = 'counter';
    }

    public function handleValue($value)
    {
        return !is_string($value)?json_encode($value,JSON_UNESCAPED_UNICODE):$value;
    }

    public function getValue($value, $default = null)
    {
        $default = $default ?? $this->default;

        return (is_string($value)?json_decode($value, FALSE):$value) ?? $default;
    }
}
