<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">


</head>
<body>
    <div class="container ">
        <div class="row justify-content-center" id="app">
            <ul class="list-group col-lg-6">
                <li class="list-group-item active">Chat App</li>
                <message v-for="message in chat.messages" v-bind:is_income="message.user==inuser" v-bind:user="message.user">
                    @{{message.message}}
                </message>
                <input type="text" class="list-group-item" placeholder="Compose message" v-model="message" v-on:keyup.enter="send">
            </ul>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}" ></script>
</body>
</html>