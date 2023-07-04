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
    return view('backend.pages.document.contract');
});


Route::get('/purchase-email', function () {
    return view('backend.partial.email.purchase');
});

Route::get('sendhtmlemail','AreaController@html_email');

Route::group(['middleware' => ['auth']], function() {

    Route::group(['prefix' => 'customer'], function (){
        Route::get          ('/',                            'CustomerController@index'                          )->name('get');
        Route::post         ('/save',                        'CustomerController@store'                          )->name('save');
        Route::get          ('/edit/{id}',                   'CustomerController@edit'                           )->name('edit');
        Route::get          ('/get',                         'CustomerController@get'                            )->name('get');
        Route::post         ('/update/{id}',                 'CustomerController@update'                         )->name('update');
        Route::get          ('/destroy/{id}',                'CustomerController@destroy'                        )->name('delete');
        Route::post         ('/get_name',                    'CustomerController@get_name'                       )->name('get_name');
    });

    Route::group(['prefix' => 'attachment'], function (){
        Route::get          ('/',                            'AttachmentController@index'                          )->name('get');
        Route::post         ('/save',                        'AttachmentController@store'                          )->name('save');
        Route::get          ('/edit/{id}',                   'AttachmentController@edit'                           )->name('edit');
        Route::post         ('/show',                        'AttachmentController@show'                           )->name('edit');
        Route::post         ('/update/{id}',                 'AttachmentController@update'                         )->name('update');
        Route::post         ('/destroy',                     'AttachmentController@destroy'                        )->name('delete');
    });

    Route::group(['prefix' => 'area'], function (){
        Route::get          ('/',                            'AreaController@index'                          )->name('get');
        Route::post         ('/save',                        'AreaController@store'                          )->name('save');
        Route::get          ('/edit/{id}',                   'AreaController@edit'                           )->name('edit');
        Route::post         ('/update/{id}',                 'AreaController@update'                         )->name('update');
        Route::get          ('/add/{id}',                    'AreaController@add'                            )->name('delete');
        Route::get          ('/destroy/{id}',                'AreaController@destroy'                        )->name('delete');
    });

    Route::group(['prefix' => 'area_detail'], function (){
        Route::get          ('/{id}',                        'AreaDetailController@index'                          )->name('get');
        Route::post         ('/save',                        'AreaDetailController@store'                          )->name('save');
        Route::get          ('/edit/{id}',                   'AreaDetailController@edit'                           )->name('edit');
        Route::post         ('/update/{id}',                 'AreaDetailController@update'                         )->name('update');
        Route::get          ('/destroy/{id}',                'AreaDetailController@destroy'                        )->name('delete');
    });

    Route::group(['prefix' => 'penalty'], function (){
        Route::get          ('/',                            'PenaltyController@index'                          )->name('get');
        Route::post         ('/save',                        'PenaltyController@store'                          )->name('save');
        Route::get          ('/edit/{id}',                   'PenaltyController@edit'                           )->name('edit');
        Route::post         ('/update/{id}',                 'PenaltyController@update'                         )->name('update');
        Route::get          ('/destroy/{id}',                'PenaltyController@destroy'                        )->name('delete');
        Route::get          ('/get',                         'PenaltyController@get'                            )->name('get');
        Route::get          ('/get_transaction/{id}',        'PenaltyController@get_transaction'                )->name('get_transaction');
        Route::get          ('/get_amortization/{id}',       'PenaltyController@get_amortization'               )->name('get_amortization');
    });

    Route::group(['prefix' => 'co_borrower'], function (){
        Route::get          ('/get/{id}',                    'CoBorrowerController@get'                          )->name('get');
        Route::post         ('/save',                        'CoBorrowerController@store'                        )->name('save');
    });

    Route::group(['prefix' => 'document'], function (){
        Route::get          ('/contract',                    'DocumentController@index'                          )->name('get');
        Route::post         ('/save',                        'DocumentController@store'                          )->name('save');
        Route::get          ('/show/{id}',                   'DocumentController@show'                           )->name('edit');
        Route::post         ('/update/{id}',                 'DocumentController@update'                         )->name('update');
        Route::get          ('/destroy/{id}',                'DocumentController@destroy'                        )->name('delete');
    });

    Route::group(['prefix' => 'payment'], function (){
        Route::get          ('/',                            'PaymentController@index'                          )->name('get');
        Route::get          ('/all',                         'PaymentController@all'                            )->name('get');
        Route::post         ('/save',                        'PaymentController@store'                          )->name('save');
        Route::get          ('/edit/{id}',                   'PaymentController@edit'                           )->name('edit');
        Route::get          ('/amortization/{code}',         'PaymentController@ma_counter'                     )->name('edit');
        Route::get          ('/amortization_2/{code}',       'PaymentController@ma_counter_2'                     )->name('edit');
        Route::get          ('/get',                         'PaymentController@get'                            )->name('get');
        Route::post         ('/filter',                      'PaymentController@filter'                         )->name('filter');
        Route::get          ('/get_attachment/{id}',         'PaymentController@getAttachment'                  )->name('filter');
        Route::post         ('/update/{id}',                 'PaymentController@update'                         )->name('update');
        Route::get          ('/destroy/{id}',                'PaymentController@destroy'                        )->name('delete');
        Route::get          ('/lot/{id}',                    'PaymentController@lotNo'                          )->name('delete');
        Route::post         ('/getWithDownpayment',          'PaymentController@getWithDownpayment'             )->name('get_downpayment');
    });

    

    Route::group(['prefix' => 'transaction'], function (){
        Route::post          ('/reservation',                 'TransactionController@reservation'               )->name('get');
        Route::get           ('/checkdp/{id}',                'TransactionController@checkdp'                   )->name('get');
        Route::get           ('/penalty',                     'TransactionController@penalty'                   )->name('get');
        Route::get           ('/soa/{id}',                    'TransactionController@soa'                       )->name('get');
        Route::get           ('/soa_frontend/{id}',           'TransactionController@soa_frontend'                       )->name('get');
        Route::get           ('/checksoa/{a}/{b}/{c}',        'TransactionController@check_soa'                       )->name('get');
        Route::get           ('/exist/{id}',                  'TransactionController@account_exists'            )->name('get');
        Route::get           ('/nodownpayment/{id}',          'TransactionController@noDownpayment'             )->name('get');
        Route::post          ('/generate_amort/{id}',         'TransactionController@generate_amortization'     )->name('get');
    });
    
    Route::group(['prefix' => 'transfer_fee'], function (){
        Route::get          ('/',                             'TransferFeeController@index'                     )->name('get');
        Route::get          ('/get',                          'TransferFeeController@get'                       )->name('get');
        Route::get          ('/edit/{id}',                    'TransferFeeController@edit'                      )->name('edit');
        Route::post         ('/save',                         'TransferFeeController@store'                     )->name('save');
    });
    
    Route::group(['prefix' => 'user'], function (){
        Route::get          ('/',                             'UserController@index'                            )->name('');
        Route::post         ('/save',                         'UserController@store'                            )->name('save');
        Route::get          ('/get',                          'UserController@get'                              )->name('get');
        Route::get          ('/edit/{id}',                    'UserController@edit'                             )->name('edit');
        Route::get          ('/destroy/{id}',                 'UserController@destroy'                          )->name('delete');
        Route::post         ('/give_access',                  'UserController@give_access'                      )->name('give_access');
        Route::get          ('/check_access/{id}',            'UserController@check_access'                     )->name('check_access');
        Route::get          ('/roles',                        'UserController@roles'                            )->name('roles');
        Route::get          ('/roles_get',                    'UserController@roles_get'                        )->name('roles_get');
        Route::post         ('/roles_save',                   'UserController@roles_store'                      )->name('roles_save');
        Route::get          ('/roles_edit/{id}',              'UserController@roles_edit'                       )->name('roles_edit');
        Route::get          ('/roles_destroy/{id}',           'UserController@roles_destroy'                    )->name('roles_delete');
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
