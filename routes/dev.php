<?php

Route::get('/test', 'TestController@test');

Route::get('/phpinfo', function () {
    echo  phpinfo();
});
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    //Artisan::call('route:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});
