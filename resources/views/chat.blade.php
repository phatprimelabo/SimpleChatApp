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

    </style>

</head>
<body>
    <div class="container ">
        <div class="row" id="app">
            <app></app>
            <div class="col-lg-4">
                <li class="list-group-item active">Recent Chats</li>
                <ul class="list-group">
                    <recentchatpannel></recentchatpannel>
                </ul>
            </div>

        <messagepannel></messagepannel>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}" ></script>
</body>
</html>