<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\Registration;
use App\Http\Controllers\Registration_server_validation;

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
});
// Route::get('/{name?}', function ($name = null) {
//     return view('home')->with(['name'=>$name]);
// });

Route::get('/home/{name?}', function ($name = null){
    $data = compact('name', $name);
    return view('home')->with($data);
});

Route::get('/about/{company?}', function ($company = null){
    return view('about')->with(['company'=>$company]);
});

// Route::get('/demo', function() {
//     echo "welcome to demo page!!!";
// });

Route::any('/test', function() {
    echo "Testing the any (get or post) route";
});


// Route::get('/basic_controller', [BasicController::class, 'start']);     // This is the recommonded method to use for controller
Route::get('/basic_controller', 'BasicController@start');  // This is the not a recommonded method to use for controller
Route::get('/single_action_controller', 'SingleActionController');

Route::resource ('/photo', 'ResourceController');

Route::get('/forms', [Registration::class, 'index']);
Route::post('/forms', [Registration::class, 'register']);

Route::get('/forms_server', [Registration_server_validation::class, 'start']);
Route::post('/forms_server', [Registration_server_validation::class, 'register']);

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