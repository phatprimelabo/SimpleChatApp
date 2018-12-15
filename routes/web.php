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
            $modify_room_name = $room->name;
            if ($room->type == 1){
                $modify_room_name = $room->users()->where('user_id','<>',Auth::user()->id)->first()->name;
            }
            $messages_by_room = $room->messages()->get();
            $messages=[];
            foreach ($messages_by_room as $item){
                $messages[] = ['user'=>$item->user()->first()->name, 'message'=>$item->content];
            }
            $rooms_datas_response[] = ['id'=>$room->id, 'name'=>$modify_room_name, 'messages' => $messages];
        }

        return response(json_encode($rooms_datas_response, JSON_UNESCAPED_UNICODE));
    }

});

Route::post('/send',function(\Illuminate\Http\Request $request){
    $data = $request->all();
    $message_id = \Illuminate\Support\Facades\DB::table('message')->insertGetId(['content'=>$data['message'], 'user_id'=>Auth::user()->id, 'room_id'=>$data['room_id']]);


    $message = \App\Message::find($message_id);
    DB::table('user_room')->where('room_id',$message->room_id)->where('user_id','<>',$message->user_id)->update(['is_read'=>0]);;

    event(new \App\Event\Chat($data['room_id'], $data['message'], Auth::user()));
    return response()->json(['message'=>$request->input('message')]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
