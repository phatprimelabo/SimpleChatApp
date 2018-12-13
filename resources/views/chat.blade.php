<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">
    <script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.js"></script>
    <style>
        .list-group{
            overflow-y: scroll;
            max-height: 300px;
        }
        .list-group::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        .list-group::-webkit-scrollbar
        {
            width: 6px;
            background-color: #007bff;
        }

        .list-group::-webkit-scrollbar-thumb
        {
            background-color: #007bff;
        }
    </style>

</head>
<body>
    <div class="container ">
        <div class="row justify-content-center" id="app">
            <div class="col-lg-6">
                <li class="list-group-item active">Chat App</li>
                <ul class="list-group" v-chat-scroll>
                    <message v-for="(message, index) in chat.messages"
                             v-bind:is_income="message.user==inuser"
                             v-bind:is_sameuser="index>0?chat.messages[index-1].user==message.user:false"
                             v-bind:user="message.user">
                        @{{message.message}}
                    </message>
                </ul>
                <input style="width: 100%" type="text" class="list-group-item" placeholder="Compose message" v-model="message" v-on:keyup.enter="send">
            </div>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}" ></script>
</body>
</html>