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
    
    // Route::get('/', function () {
    //     return view('backend.pages.dashboard');
    // });
    
    Route::get('/dashboard', function () {
        return view('backend.pages.dashboard');
    });

    Route::get('maintenance/calendar', function () {
        return view('backend.pages.maintenance.calendar');
    });
    Route::get('maintenance/customer', function () {
        return view('backend.pages.maintenance.customer');
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
        
        Route::group(['prefix' => '/area'], function (){
            Route::get          ('/',                            'AreaController@index'                          )->name('area');
            Route::get          ('/customer-record',             'AreaController@customer_record'                )->name('area_customer_record');
            // Route::get          ('/get',                         'EmployeeInformationController@get'                            )->name('get_employment_information');
            // Route::post         ('/save',                        'EmployeeInformationController@store'                          )->name('save_employment_information');
            // Route::get          ('/edit/{id}',                   'EmployeeInformationController@edit'                           )->name('edit_employment_information');
            // Route::post         ('/update/{id}',                 'EmployeeInformationController@update'                         )->name('update_employment_information');
            // Route::get          ('/destroy/{id}',                'EmployeeInformationController@destroy'                        )->name('destroy_employment_information');
            // Route::get          ('/sample',                      'EmployeeInformationController@sample'                         )->name('destroy_employment_information');
        });
    });

 });

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Auth::routes();

Route::get('/', function () {
    return view('frontend.pages.home');
});

Route::get('/home', 'HomeController@index' )->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
