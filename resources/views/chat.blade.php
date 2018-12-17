@extends('layouts.app')
@section('content')
    <div class="col-lg-12" id="app" style="padding: 0px">
        <app class="row no-gutters" style="height: 100%;"></app>
    </div>
    <script src="{{asset('js/app.js')}}" ></script>
    <!--<script>
        $(document).ready(function(){
            resizeDiv();
        });

        window.onresize = function(event) {
            resizeDiv();
        }

        function resizeDiv() {
            vpw = $(window).width();
            vph = $(window).height();
            $('#app').css({'height': vph + 'px'});
        }
    </script>-->
@endsection