<?php
Route::get('hello', function(){
    echo 'Hello from liuning the my-first-laravel-package package!';
});

#
Route::group(['prefix' => 'api', 'namespace' => 'ChongEric\ApiCleaner\Controllers'],function(){
    Route::get('hello/{name}', 'HelloWorldController@hello');
    Route::get('world/{name}', 'HelloWorldController@world');

    Route::get('name/eric', function(){
        echo "太突然了";
    });
});

//Route::get('hello/{name}', 'ChongEric\ApiCleaner\Controllers\HelloWorldController@hello');
//Route::get('world/{name}', 'ChongEric\ApiCleaner\Controllers\HelloWorldController@world');


Route::middleware(['chong.api'])->group(function ($router) {
    $router->get('chong/api', function () {
        return 'api success';
    });
});
