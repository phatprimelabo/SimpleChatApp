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
    return response(json_encode(['name'=>Auth::user()->name],JSON_UNESCAPED_UNICODE));
});

Route::get('/getrooms', function(){
    if(Auth::user()){
        $rooms = Auth::user()->rooms()->get();
        $rooms_datas_response=[];
        foreach ($rooms as $room){

            $rooms_datas_response[] = ['id'=>$room->id, 'name'=>$room->name, 'messages' => []];
        }

        return response(json_encode($rooms_datas_response, JSON_UNESCAPED_UNICODE));
    }

});

Route::post('/send',function(\Illuminate\Http\Request $request){
    $data = $request->all();
     event(new \App\Event\Chat($data['room_id'], $data['message'], Auth::user()));
     return response()->json(['message'=>$request->input('message')]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
