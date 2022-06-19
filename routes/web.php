<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => ['auth']], function() {
    
    Route::group(['prefix' => 'customer'], function (){
        Route::get          ('/',                            'CustomerController@index'                            )->name('get_employment_information');
        Route::post         ('/save',                        'CustomerController@store'                          )->name('save_employment_information');
        Route::get          ('/edit/{id}',                   'CustomerController@edit'                           )->name('edit_employment_information');
        Route::post         ('/update/{id}',                 'CustomerController@update'                         )->name('update_employment_information');
        Route::get          ('/destroy/{id}',                'CustomerController@destroy'                        )->name('destroy_employment_information');
    });
    
    Route::get('/dashboard', function () {
        return view('backend.pages.dashboard');
    });

    Route::get('maintenance/calendar', function () {
        return view('backend.pages.maintenance.calendar');
    });
    Route::get('maintenance/agent', function () {
        return view('backend.pages.maintenance.agent');
    });
    Route::get('maintenance/van', function () {
        return view('backend.pages.maintenance.van');
    });
    
    Route::group(['prefix' => '/api'], function (){
        Route::group(['prefix' => '/leave-type'], function (){
            Route::post         ('/getData',                     'LeaveTypeController@getData'                                  )->name('get_data_leave_type');
        });
    });
    
    Route::group(['prefix' => '/transaction'], function (){
        
        Route::get('/commission', function () {
            return view('backend.pages.commission.commission');
        });
        
        Route::group(['prefix' => '/area'], function (){
            Route::get          ('/',                            'AreaController@index'                          )->name('area');
            Route::get          ('/customer-record',             'AreaController@customer_record'                )->name('area_customer_record');
        });

        Route::group(['prefix' => '/van'], function (){
            Route::get          ('/',                            'VanController@index'                           )->name('van');
            Route::get          ('/schedule',                    'VanController@schedule'                        )->name('van_schedule');
        });
        
    });

    Route::group(['prefix' => '/maintenance'], function (){

        Route::group(['prefix' => '/van'], function (){
            Route::get          ('/',                            'VanController@index'                           )->name('van');
        });

        Route::get('/calendar', function () {
            return view('backend.pages.calendar');
        });

        Route::get('/agent', function () {
            return view('backend.pages.maintenance.agent');
        });

        Route::get('/van', function () {
            return view('backend.pages.maintenance.van');
        });
    });

 });

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Auth::routes();

Route::get('/', function () {
    return view('frontend.pages.home');
});

Route::get('/properties', function () {
    return view('frontend.pages.properties');
});

Route::get('/about', function () {
    return view('frontend.pages.about');
});

Route::get('/agents', function () {
    return view('frontend.pages.agents');
});

Route::get('/contact', function () {
    return view('frontend.pages.contact');
});

Route::get('/agent/details', function () {
    return view('frontend.pages.single.agent');
});

Route::get('/property/details', function () {
    return view('frontend.pages.single.property');
});

Route::get('/account-status', function () {
    return view('frontend.pages.custom_pages.inquiry');
});

Route::get('/home', 'HomeController@index' )->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
