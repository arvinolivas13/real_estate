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

Route::get('/schedule-of-payment', function () {
    return view('backend.partial.sop');
});


Route::get('/contract', function () {
    return view('backend.partial.contract');
});

Route::get('sendhtmlemail','AreaController@html_email');

Route::group(['middleware' => ['auth']], function() {

    Route::group(['prefix' => 'customer'], function (){
        Route::get          ('/',                            'CustomerController@index'                          )->name('get_employment_information');
        Route::post         ('/save',                        'CustomerController@store'                          )->name('save_employment_information');
        Route::get          ('/edit/{id}',                   'CustomerController@edit'                           )->name('edit_employment_information');
        Route::post         ('/update/{id}',                 'CustomerController@update'                         )->name('update_employment_information');
        Route::get          ('/destroy/{id}',                'CustomerController@destroy'                        )->name('destroy_employment_information');
    });

    Route::group(['prefix' => 'area'], function (){
        Route::get          ('/',                            'AreaController@index'                          )->name('get_employment_information');
        Route::post         ('/save',                        'AreaController@store'                          )->name('save_employment_information');
        Route::get          ('/edit/{id}',                   'AreaController@edit'                           )->name('edit_employment_information');
        Route::post         ('/update/{id}',                 'AreaController@update'                         )->name('update_employment_information');
        Route::get          ('/destroy/{id}',                'AreaController@destroy'                        )->name('destroy_employment_information');
    });

    Route::group(['prefix' => 'area_detail'], function (){
        Route::get          ('/{id}',                        'AreaDetailController@index'                          )->name('get_employment_information');
        Route::post         ('/save',                        'AreaDetailController@store'                          )->name('save_employment_information');
        Route::get          ('/edit/{id}',                   'AreaDetailController@edit'                           )->name('edit_employment_information');
        Route::post         ('/update/{id}',                 'AreaDetailController@update'                         )->name('update_employment_information');
        Route::get          ('/destroy/{id}',                'AreaDetailController@destroy'                        )->name('destroy_employment_information');
    });

    Route::group(['prefix' => 'penalty'], function (){
        Route::get          ('/',                            'PenaltyController@index'                          )->name('get_employment_information');
        Route::post         ('/save',                        'PenaltyController@store'                          )->name('save_employment_information');
        Route::get          ('/edit/{id}',                   'PenaltyController@edit'                           )->name('edit_employment_information');
        Route::post         ('/update/{id}',                 'PenaltyController@update'                         )->name('update_employment_information');
        Route::get          ('/destroy/{id}',                'PenaltyController@destroy'                        )->name('destroy_employment_information');
    });

    Route::group(['prefix' => 'payment'], function (){
        Route::get          ('/',                            'PaymentController@index'                          )->name('get_employment_information');
        Route::post         ('/save',                        'PaymentController@store'                          )->name('save_employment_information');
        Route::get          ('/edit/{id}',                   'PaymentController@edit'                           )->name('edit_employment_information');
        Route::post         ('/update/{id}',                 'PaymentController@update'                         )->name('update_employment_information');
        Route::get          ('/destroy/{id}',                'PaymentController@destroy'                        )->name('destroy_employment_information');
        Route::get          ('/lot/{id}',                    'PaymentController@lotNo'                          )->name('destroy_employment_information');
    });

    Route::group(['prefix' => 'transaction'], function (){
        Route::post          ('/reservation',                 'TransactionController@reservation'               )->name('get_employment_information');
        Route::get           ('/checkdp/{id}',                'TransactionController@checkdp'                   )->name('get_employment_information');
        Route::get           ('/penalty',                     'TransactionController@penalty'                   )->name('get_employment_information');
        Route::get           ('/soa/{id}',                    'TransactionController@soa'                       )->name('get_employment_information');
        Route::post          ('/generate_amort/{id}',         'TransactionController@generate_amortization'     )->name('get_employment_information');
    });

    Route::get('/dashboard', function () {
        return view('backend.pages.dashboard');
    });
   


    Route::get('/document-management', function () {
        return view('backend.pages.elfinder');
    });

    Route::get('e-soa', function () {
        return view('backend.contents.esoa');
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

// Route::get('/payment', 'PaymentTransactionController@index');
// Route::post('/charge', 'PaymentTransactionController@charge');
// Route::get('/confirm', 'PaymentTransactionController@confirm');
