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
    
    Route::group(['prefix' => '/api'], function (){
        Route::group(['prefix' => '/leave-type'], function (){
            Route::post         ('/getData',                     'LeaveTypeController@getData'                                  )->name('get_data_leave_type');
        });
    });
    
    Route::group(['prefix' => '/payroll'], function (){
        
        Route::group(['prefix' => '/employee-information'], function (){
            Route::get          ('/',                            'EmployeeInformationController@index'                          )->name('employment_information');
            Route::get          ('/get',                         'EmployeeInformationController@get'                            )->name('get_employment_information');
            Route::post         ('/save',                        'EmployeeInformationController@store'                          )->name('save_employment_information');
            Route::get          ('/edit/{id}',                   'EmployeeInformationController@edit'                           )->name('edit_employment_information');
            Route::post         ('/update/{id}',                 'EmployeeInformationController@update'                         )->name('update_employment_information');
            Route::get          ('/destroy/{id}',                'EmployeeInformationController@destroy'                        )->name('destroy_employment_information');
            Route::get          ('/sample',                      'EmployeeInformationController@sample'                         )->name('destroy_employment_information');
        });
        
        Route::group(['prefix' => '/company-profile'], function (){
            Route::get          ('/',                            'CompanyProfileController@index'                               )->name('employment_information');
            Route::get          ('/get',                         'CompanyProfileController@get'                                 )->name('get_company_profile');
            Route::post         ('/save',                        'CompanyProfileController@store'                               )->name('save_company_profile');
            Route::get          ('/edit/{id}',                   'CompanyProfileController@edit'                                )->name('edit_company_profile');
            Route::post         ('/update/{id}',                 'CompanyProfileController@update'                              )->name('update_company_profile');
            // Route::get          ('/destroy/{id}',                'EmployeeInformationController@destroy'                        )->name('destroy_employment_information');
        });
        
        Route::group(['prefix' => '/classes'], function (){
            Route::get          ('/',                            'ClassesController@index'                                      )->name('classes');
            Route::get          ('/get',                         'ClassesController@get'                                        )->name('get_classes');
            Route::post         ('/save',                        'ClassesController@store'                                      )->name('save_classes');
            Route::get          ('/edit/{id}',                   'ClassesController@edit'                                       )->name('edit_classes');
            Route::post         ('/update/{id}',                 'ClassesController@update'                                     )->name('update_classes');
            Route::get          ('/destroy/{id}',                'ClassesController@destroy'                                    )->name('destroy_classes');
        });
        
        Route::group(['prefix' => '/department'], function (){
            Route::get          ('/',                            'DepartmentsController@index'                                  )->name('department');
            Route::get          ('/get',                         'DepartmentsController@get'                                    )->name('get_department');
            Route::post         ('/save',                        'DepartmentsController@store'                                  )->name('save_department');
            Route::get          ('/edit/{id}',                   'DepartmentsController@edit'                                   )->name('edit_department');
            Route::post         ('/update/{id}',                 'DepartmentsController@update'                                 )->name('update_department');
            Route::get          ('/destroy/{id}',                'DepartmentsController@destroy'                                )->name('destroy_department');
        });
        
        Route::group(['prefix' => '/position'], function (){
            Route::get          ('/',                            'PositionsController@index'                                    )->name('position');
            Route::get          ('/get',                         'PositionsController@get'                                      )->name('get_position');
            Route::post         ('/save',                        'PositionsController@store'                                    )->name('save_position');
            Route::get          ('/edit/{id}',                   'PositionsController@edit'                                     )->name('edit_position');
            Route::post         ('/update/{id}',                 'PositionsController@update'                                   )->name('update_position');
            Route::get          ('/destroy/{id}',                'PositionsController@destroy'                                  )->name('destroy_position');
        });

        Route::group(['prefix' => '/leave-type'], function (){
            Route::get          ('/',                            'LeaveTypeController@index'                                    )->name('leave_type');
            Route::get          ('/get',                         'LeaveTypeController@get'                                      )->name('get_leave_type');
            Route::post         ('/save',                        'LeaveTypeController@store'                                    )->name('save_leave_type');
            Route::get          ('/edit/{id}',                   'LeaveTypeController@edit'                                     )->name('edit_leave_type');
            Route::post         ('/update/{id}',                 'LeaveTypeController@update'                                   )->name('update_leave_type');
            Route::get          ('/destroy/{id}',                'LeaveTypeController@destroy'                                  )->name('destroy_leave_type');
        });

        Route::group(['prefix' => '/employment'], function (){
            Route::post          ('/save',                       'EmploymentController@save'                                    )->name('save_employment');
        });

        Route::group(['prefix' => '/leaves'], function (){
            Route::post          ('/save',                       'LeavesController@save'                                        )->name('save_leaves');
            // Route::get           ('/get/{id}',                   'LeavesController@get'                                         )->name('get_leaves');
            // Route::get           ('/edit/{id}',                  'LeavesController@edit'                                        )->name('edit_leaves');
            // Route::get           ('/destroy/{id}',               'LeavesController@destroy'                                     )->name('destroy_leaves');
        });
    });

    Route::group(['prefix' => '/settings'], function (){
        
        Route::group(['prefix' => '/users'], function (){
            Route::get          ('/',                            'UserController@index'                                         )->name('classes');
            Route::get          ('/get',                         'UserController@get'                                           )->name('get_classes');
            Route::post         ('/save',                        'UserController@store'                                         )->name('save_classes');
            Route::get          ('/edit/{id}',                   'UserController@edit'                                          )->name('edit_classes');
            Route::post         ('/update/{id}',                 'UserController@update'                                        )->name('update_classes');
            Route::get          ('/destroy/{id}',                'UserController@destroy'                                       )->name('destroy_classes');
        });

        Route::group(['prefix' => '/role'], function (){
            Route::get          ('/',                            'RolesController@index'                                        )->name('employment_information');
            Route::post         ('/save',                        'RolesController@store'                                        )->name('save_employment_information');
            Route::get          ('/edit/{id}',                   'RolesController@edit'                                         )->name('edit_employment_information');
            Route::post         ('/update/{id}',                 'RolesController@update'                                       )->name('update_employment_information');
            Route::get          ('/destroy/{id}',                'RolesController@destroy'                                      )->name('destroy_employment_information');
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
