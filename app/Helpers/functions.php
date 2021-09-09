<?php

if (! function_exists('build_canonical')) {
    function build_canonical($query_string = false):string
    {
        return config('app.url').str_replace('//','/','/'.request()->{$query_string?'getRequestUri':'getPathInfo'}());
    }
}

if (! function_exists('ajax_error_message')) {
    function ajax_error_message($message = ''):string
    {
        return config('app.debug')?$message:trans('common.errors.something_wrong');
    }
}
