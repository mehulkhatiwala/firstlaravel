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

Route::get('/database/crud/registration', [CustomerController::class, 'index']);
Route::post('/database/crud/registration', [CustomerController::class, 'store']);
Route::get('/database/crud/customers', [CustomerController::class, 'view'])->name('customer.view');
Route::get('/database/crud/customers/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');
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