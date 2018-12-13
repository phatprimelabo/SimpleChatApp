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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chat', function(){
    return view('chat');
});

Route::get('/getname', function(){
    return response()->json(['name'=>Auth::user()->name]);
});

Route::post('/send',function(\Illuminate\Http\Request $request){
     event(new \App\Event\Chat($request->input('message'), Auth::user()));
     return response()->json(['message'=>$request->input('message')]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
