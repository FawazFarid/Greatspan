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



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
|This route group applies the "web" middleware group to every route
|it contains. The "web" middleware group is defined in your HTTP
|kernel and includes session state, CSRF protection, and more.
|
*/
    Route::get('/', function () {
        return view('users.login');
    })->name('home');
    
    Route::get('/register', [
        'uses' => 'UserController@getRegister',
        'as' => 'register',
        'middleware' => "auth",
    ]);
    
    Route::post('/register', 'UserController@postRegister');
    
    Route::post('/signin', [
        'uses' => 'UserController@postSignIn',
        'as' => 'signin'
    ]);
    
    Route::get('/users', [
        'uses' => 'UserController@getUserList',
        'as' => 'user.list',
        'middleware' => "auth"
    ]);
    
    Route::get('user/edit/{id}', [
        'uses' => 'UserController@getEdit',
        'as' => 'user.edit',
        'middleware' => "auth"
    ]);
    Route::post('/user/edit/{id}', 'UserController@postEdit');
    
    Route::get('user/delete/{id}', [
       'uses' => 'UserController@getDelete',
       'as' => 'user.delete',
       'middleware' => "auth",
    ]);
    
    Route::get('/dashboard', [
        'uses' => 'HomeController@getDashboard',
        'as' => 'dashboard',
        'middleware' => 'auth'
    ]);
    
    Route::get('/logout', [
       'uses' => 'UserController@getLogout',
       'as' => 'logout'
    ]);
    
/*
|--------------------------------------------------------------------------
|   Bookings Routes
|--------------------------------------------------------------------------
|
*/   
    
    Route::get('/bookings', [
        'uses' => 'BookingController@getBookingsList',
        'as' => 'bookings.list',
        'middleware' => "auth",
    ]);
    
    Route::get('/bookings/bookings.json', [
        'uses' => 'BookingController@getBookingsJson',
        'as' => 'bookings.json',
        'middleware' => "auth"
    ]);
    
    Route::get('/new-booking', [
        'uses' => 'BookingController@getNew',
        'as' => "booking.new",
        "middleware" => "auth"
    ]);
    
    Route::post('/new-booking', 'BookingController@postNew');
    
    Route::get('/edit-booking/{id}',[
        'uses' => 'BookingController@getEdit',
        'as' => 'booking.edit',
        'middleware' => "auth"
    ]);
    
    Route::post('/edit-booking/{id}','BookingController@postEdit');
    
    Route::get('/bookings/{id}',[
        'uses' => 'BookingController@getBookingById',
        'as' => 'booking.profile',
        
    ]);
    
    Route::get('/delete-booking/{id}',[
        'uses' => 'BookingController@getDelete',
        'as' => 'booking.delete',
        'middleware' => "auth"
    ]);
    
/*
|--------------------------------------------------------------------------
|   Consignee Routes
|--------------------------------------------------------------------------
|
*/   
    Route::get('/new-consignee', [
        'uses' => 'ConsigneeController@getNew',
        'as' => 'consignee.new',
        'middleware' => "auth"
    ]);
    
    Route::post('/new-consignee', 'ConsigneeController@postNew');
    
    Route::get('/consignees',[
        'uses' => 'ConsigneeController@getConsigneeList',
        'as' => 'consignee.list',
        'middleware' => "auth"
    ]);
    
    Route::get('/consignees/consignees.json', [
        'uses' => 'ConsigneeController@getConsigneeJson',
        'as' => 'consignee.json',
        'middleware' => "auth"
    ]);
    
    Route::get('/consignees/consignees.datatables', [
        'uses' => 'ConsigneeController@getConsigneeDatatable',
        'as' => 'consignee.datatable'
    ]);
    
    Route::get('/edit-consignee/{id}',[
        'uses' => 'ConsigneeController@getEdit',
        'as' => 'consignee.edit'
    ]);
    
    Route::post('/edit-consignee/{id}','ConsigneeController@postEdit');
    
    Route::get('/consignees/{id}',[
        'uses' => 'ConsigneeController@getConsigneeById',
        'as' => 'consignee.profile',
        'middleware' => "auth"
    ]);
    Route::get('/delete-consignee/{id}',[
        'uses' => 'ConsigneeController@getDelete',
        'as' => 'consignee.delete',
        'middleware' => "auth"
    ]);
    
/*
|--------------------------------------------------------------------------
|   Vessel Routes
|--------------------------------------------------------------------------
|
*/   
    Route::post('/vessel-create',[
        'uses' => 'VesselController@postNew',
        'as' => 'vessel.new',
        'middleware' => "auth",
    ]);
    
    Route::get('/vessels/vessels.json', [
        'uses' => 'VesselController@getVesselJson',
        'as' => 'vessel.json',
        'middleware' => "auth"
    ]);
    
/*
|--------------------------------------------------------------------------
|   Driver Routes
|--------------------------------------------------------------------------
|
*/   

    Route::post('/driver-create', [
       'uses' => 'DriverController@postNew',
       'as' => 'driver.new',
       'middleware' => "auth"
    ]);
    
    Route::get('/drivers/drivers.json', [
        'uses' => 'DriverController@getDriverJson',
        'as' => 'driver.json'
    ]);
    
    Route::get('/drivers',[
        'uses' => 'DriverController@getDriverList',
        'as' => 'driver.list',
        'middleware' => "auth"
    ]);
    
    Route::get('/drivers/driver.datatable', [
        'uses' => 'DriverController@getDriverDatatable',
        'as' => 'driver.datatable'
    ]);
    
    Route::get('/drivers/{id}', [
        'uses' => 'DriverController@getDriverById',
        'as' => 'driver.profile'
    ]);
    
    Route::get('/edit-driver/{id}',[
        'uses' => 'DriverController@getEdit',
        'as' => 'driver.edit'
    ]);
    
    Route::post('/edit-driver/{id}','DriverController@postEdit');
    
    Route::get('/delete-driver/{id}',[
        'uses' => 'DriverController@getDelete',
        'as' => 'driver.delete'
    ]);
    
    /*
|--------------------------------------------------------------------------
|   Employee Routes
|--------------------------------------------------------------------------
|
*/   
    Route::get('/new-employee', [
        'uses' => 'EmployeeController@getNew',
        'as' => 'employee.new',
        'middleware' => "auth"
    ]);
    
    Route::post('/new-employee', 'EmployeeController@postNew');
    
    Route::get('/employees',[
        'uses' => 'EmployeeController@getEmployeeList',
        'as' => 'employee.list',
        'middleware' => "auth"
    ]);
    
    Route::get('/employees/employee.datatable', [
        'uses' => 'EmployeeController@getEmployeeDatatable',
        'as' => 'employee.datatable'
    ]);
    
    Route::get('/edit-employee/{id}',[
        'uses' => 'EmployeeController@getEdit',
        'as' => 'employee.edit',
        'middleware' => "auth"
    ]);
    
    Route::post('/edit-employee/{id}','EmployeeController@postEdit');
    
    Route::get('/employee/{id}',[
        'uses' => 'EmployeeController@getConsigneeById',
        'as' => 'employee.profile'
    ]);
    Route::get('/delete-employee/{id}',[
        'uses' => 'EmployeeController@getDelete',
        'as' => 'employee.delete'
    ]);