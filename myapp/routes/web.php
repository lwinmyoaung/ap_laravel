<?php

use App\Test;
use App\TestFacade;
// use Illuminate\Support\Facades\View;
use App\TestContainer;
use Illuminate\Http\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;


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
// Route::get('/',[HomeController::class,'index']);
// Route::get('contact',[HomeController::class,'contact']);
// Route::get('about',[HomeController::class,'about']);

// Toute link to Resource Controller
Route::resource('posts',HomeController::class)->middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',]);

// Named Route Example
Route::get('/namingroute',[HomeController::class,'testnameingroute'])->name('root');

// Middleware Original Code
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// Current Working Code
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', [HomeController::class,'index']);
});

Route::post('logout', [AuthController::class, 'logout']);

// Testing Container
// Route::get('/',function(){
//     // Creating Local Container
//     $container = new TestContainer();

//     // Service Binding
//     $container->bind('test',function(){
//         return new Test();
//     });

//     // Service Yielding
//     $test = $container->resolve('test');
//     dd($test->smth());
// });

// Testing Laravel Real Container
// Route::get('/',function(){
//     // Using Laravel Container
//     app()->bind('test',function(){
//         return new Test('LwinMyoAung');
//     });

//     // Service Resolving or Yielding Method 1 (Finding, Is service key 'test' binding?)
//     $test = resolve('test');
//     // // Service Resolving or Yielding Method 2 (Finding, Is Class Instance Exist?)
//     // $test = resolve(App\Test::class);
//     dd($test);
// });

// Testing Laravel Real Container and AppServiceProvider Using double resolve() and bind() in AppServiceProvider
// Route::get('/',function(){
//     $test = resolve('test');
//     dd($test);
// });

// // Testing Laravel Real Container and AppServiceProvider Using double resolve() and singleton() in AppServiceProvider
// Route::get('/',function(){
//     dd(resolve('test'),resolve('test'));
// });

// Inject Class Practice not use resolve()
// Route::get('/',function(Test $test){
//     dd($test);
// });

// // Practise Facade not using Facade
// Route::get('/',function(){
//     $view = new View();
//     return $view->make('welcometestingfacade');
// });

// // Practise Facade using Facade
// Route::get('/',function(){
//     // return view('welcometestingfacade');
//     // return View::make('welcometestingfacade');
//     dd(resolve('view'));
// });

// // Practise Facade not using Facade
// Route::get('/', function (Illuminate\Http\Request $request) {
//     $name = $request->input('name'); // or request('name')
//     return $name ?? 'no name';
// });

// // Creating Manually Facade using Laravel Default Service Provider 
// Route::get('/', function () {
//     return TestFacade::execute();
//     // //using helper func:
//     // dd(app('test')->execute());
// });

// // Explict Binding
// Route::get('/', function () {
//     return TestFacade::execute();
// });

// // Implict Binding
// Route::get('/', function () {
//     dd(app('test')->execute());
// });

// // Testing Livewire
// Route::get('/', function () {
//     return view('welcomelivewire');
// });