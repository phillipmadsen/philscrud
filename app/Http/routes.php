<?php
    /*
    |--------------------------------------------------------------------------
    | Application Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register all of the routes for an application.
    | It's a breeze. Simply tell Laravel the URIs it should respond to
    | and give it the controller to call when that URI is requested.
    |
    */
    Route::get('/', function () {
        return view('welcome');
    });
 
    
/*
|--------------------------------------------------------------------------
| view routes
|--------------------------------------------------------------------------
*/
    Route::get('routes', function () {
        \Artisan::call('route:list');
        return '<pre>' . \Artisan::output() . '</pre>';
    });

/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'api', 'namespace' => 'API'], function ()
{
	Route::group(['prefix' => 'v1'], function ()
	{
        require Config::get('generator.path_api_routes');
	});
});



/*
|--------------------------------------------------------------------------
| Live routes
|--------------------------------------------------------------------------
*/
include('live_routes.php');
 

 
/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function ()
{
        require Config::get('generator.path_admin_routes');
});
 

 




