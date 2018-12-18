@extends('layouts.app')
@section('content')
    <div class="col-lg-12" id="app" style="padding: 0px">
        <app class="row no-gutters" style="height: 100%;"></app>
    </div>
    <script src="{{asset('js/app.js')}}" ></script>
    <style>
        body{
            overflow: hidden;
        }
    </style>
@endsection