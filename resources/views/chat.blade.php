<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.js"></script>
    <style>
        .chat-pannel{
            overflow-y: scroll;
            height: 400px;
        }
        .chat-pannel::-webkit-scrollbar-track
        {

            background-color: white;
        }

        .chat-pannel::-webkit-scrollbar
        {
            width: 6px;
            background-color: #007bff;
        }

        .chat-pannel::-webkit-scrollbar-thumb
        {
            background-color: #007bff;
        }
    </style>

</head>
<body>
    <div class="container ">
        <div class="row" id="app">
            <div class="col-lg-4">
                <li class="list-group-item active">Recent Chats</li>
                <ul class="list-group">
                   <room v-for="room in rooms" v-bind:name="room.name"></room>
                </ul>
            </div>

            <div class="col-lg-8">
                <li class="list-group-item active">Current Chat</li>
                <ul class="list-group chat-pannel p-2" v-chat-scroll >
                    <message v-for="(message, index) in chat.messages"
                             v-bind:is_income="message.user==inuser"
                             v-bind:is_sameuser="index>0?chat.messages[index-1].user==message.user:false"
                             v-bind:user="message.user"
                             v-bind:content="message.message">
                    </message>
                </ul>
                <input style="width: 100%" type="text" class="list-group-item" placeholder="Compose message" v-model="message" v-on:keyup.enter="send">
            </div>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}" ></script>
</body>
</html>