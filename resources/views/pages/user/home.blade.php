@extends('layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s' Homepage
@endsection

@section('template_fastload_css')
@endsection

@section('content')
    <style>
        html, body {
            background-color: rgba(0,0,0,.85);
            color: #FFFFFF;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        .content {
            text-align: center;
            color: #888888;
        }

    </style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('panels.welcome-panel')
        </div>
    </div>


        </div>


@endsection

@section('footer_scripts')
@endsection