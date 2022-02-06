<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\Registration;
use App\Http\Controllers\Registration_server_validation;
use App\Http\Controllers\components;
use App\Http\Controllers\AllCustomers;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerSoftDeleteController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\ShopSingleController;

use Illuminate\Support\Facades\App;
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


Route::get('/blade-intro/{name?}', function($name = null){
    $demo = "<h5>Html entity demo</h5>";
    $data = compact('name', 'demo');
    return view('blade_intro')->with($data);
})->name('blade.intro');
// Route::get('/{name?}', function ($name = null) {
//     return view('home')->with(['name'=>$name]);
// });

Route::get('/home/{name?}', function ($name = null){
    $data = compact('name', $name);
    return view('home')->with($data);
})->name('home');

Route::get('/about/{company?}', function ($company = null){
    return view('about')->with(['company'=>$company]);
})->name('about');


// Route::get('/demo', function() {
//     echo "welcome to demo page!!!";
// });

Route::any('/test', function() {
    echo "Testing the any (get or post) route";
});


// Route::get('/basic_controller', [BasicController::class, 'start']);     // This is the recommonded method to use for controller
Route::get('/controller/basic_controller', 'BasicController@start')->name('basic_controller');  // This is the not a recommonded method to use for controller
Route::get('/controller/single_action_controller', 'SingleActionController')->name('single_action_controller');

Route::resource('/controller/photo', 'ResourceController');

Route::get('/validation/forms', [Registration::class, 'index'])->name('index_client_validation');
Route::post('/validation/forms', [Registration::class, 'register'])->name('register_client_validation');

Route::get('/validation/forms_server', [Registration_server_validation::class, 'start'])->name('start_server_validation');
Route::post('/validation/forms_server', [Registration_server_validation::class, 'register'])->name('register_server_validation');

Route::get('/components', [components::class, 'myfunc']);
Route::post('/components', [components::class, 'myfunc2']);

Route::get('/database/view_all_customers', [AllCustomers::class, 'index'])->name('select');

Route::group(['prefix' => '/database/crud'], function(){
    // REGULAR CRUD OPERATION
    Route::get('/registration', [CustomerController::class, 'index']);
    Route::post('registration', [CustomerController::class, 'store']);
    Route::get('customers', [CustomerController::class, 'view'])->name('customer.view');
    Route::get('customers/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');
    Route::get('customers/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('customers/update/{id}',[CustomerController::class, 'update'])->name('customer.update');
    
    // SOFTDELETE FUNCTIONALITY
    Route::get('softdelete/registration', [CustomerSoftDeleteController::class, 'index'])->name('customer_reg');
    Route::post('softdelete/registration', [CustomerSoftDeleteController::class, 'store'])->name('customer_save');
    Route::get('softdelete/customers/trash', [CustomerSoftDeleteController::class, 'show_trashed_only'])->name('customer_trashed_display');
    Route::get('softdelete/customers/all', [CustomerSoftDeleteController::class, 'show_except_trashed'])->name('customer_except_trashed_display');
    Route::get('softdelete/delete/{id}', [CustomerSoftDeleteController::class, 'soft_delete'])->name('customer_soft_delete');
    Route::get('softdelete/force_delete/{id}', [CustomerSoftDeleteController::class, 'force_delete'])->name('customer_force_delete');
    Route::get('softdelete/restore/{id}', [CustomerSoftDeleteController::class, 'restore'])->name('customer_restore');
});

// Localization
Route::get('localization/{lang?}', function ($lang = null) {
    App::setlocale($lang);
    return view('localization');

})->name('localization');

// CONVERT HTML TEMPLATE INTO LARAVEL PROJECT
Route::get('/', [HomeController::class, 'index'])->name('home_page');
Route::get('/AboutUs', [AboutController::class, 'index'])->name('about_page');
Route::get('/Contact', [ContactController::class, 'index'])->name('contact_page');
Route::post('/Contact', [ContactController::class, 'store'])->name('store_contact');
Route::get('/Shop', [ShopController::class, 'index'])->name('shop_page');
Route::get('/Shop-Single', [ShopSingleController::class, 'index'])->name('shop_single_page');



Route::get('/session', [CustomerController::class, 'session_management'])->name('session.demo');
Route::post('/session', [CustomerController::class, 'session_add'])->name('session.add');
Route::get('/view_session_data', function(){
    $session = session()->all();
    $data = compact('session');
    return view('/view_session_data')->with($data);
})->name('session_all');
Route::get('/destroy_session_data', function(){
    session()->flush();
    return redirect()->route('session_all');
})->name('session_destroy');
// Route::get('/mydemoroute', function() {
//     return view('demo');
// });

// // ROUTE WITH PARAMETERS
// Route::get('/demo_1/{name}/{id?}', function($name, $id = '') {
//     echo "<strong>Your name:</strong> ".ucfirst(strtolower($name))."<br/><strong>Id:</strong> ".$id;
// });

// // ROUTE WITH PARAMETERS AND SEND DATA TO VIEW PAGE
// Route::get('/demo_2/{name}/{age?}', function($name, $age = null) {
//     $data = compact('name', 'age');
//     // print_r($data);
//     return view('pass_param')->with($data);
// });


// Route::get('/{name?}', function ($name = null) {
//     $data = ['name'=>$name];
//     // return view('home')->with($data);
//     return view('home')->with(['name'=>$name]);
// });
// Route::post('/test', function() {
//     echo "Testing the post route";
// });

// Route::put('/test1', function() {
//     echo "Testing for put route";
// });

// Route::patch('/test2', function() {
//     echo "Testing for patch route";
// });

// Route::delete('/test3', function() {
//     echo "Testing the delete route";
// });