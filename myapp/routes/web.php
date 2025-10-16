<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;

Route::get('/welcome', function () {
    return view('welcome');
});

// // I : Routing and Static Data Pass
// Route::get('/contact', function () {
//     // $data = 'some data';
    
//     // XSS Attack ပုံစံ
//     $data = '<script>alert("Boom")</script>';
//     return view('contact',['data'=>$data]);
// });

// // I : Dynamic data pass
// Route::get('/contact', function () {
//     $data = request('name');
//     return $data;
// });

// // I : Route Wildcard
// Route::get('/contact/{name}', function ($name) {
//     return $name;
// });

// Route::get('/', function () {
    // $data = [
    //     'home_key' => 'home_value',
    // ];
    // return view('home',compact('data'));
// });

// Route::get('/contact', function () {
//     $data = [
//         'contact_key' => 'contact_value',
//     ];
//     return view('contact',compact('data'));
// });

// Route::get('/about', function () {
//     $data = [
//         'about_key' => 'about_value',
//     ];
//     return view('about',compact('data'));
// });

// Route link to Controller
Route::get('/',[HomeController::class,'index']);
// Route::get('contact',[HomeController::class,'contact']);
// Route::get('about',[HomeController::class,'about']);