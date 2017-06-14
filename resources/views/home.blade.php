@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
<style>
    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }
    .content {
        text-align: center;
    }
</style>

            </div>
        </div>
    </div>
    <div class="flex-center position-ref full-height">
        <img src="{{URL::asset('/images/logo.png')}}">
        {!! trans('titles.app') !!}
        You are logged in!
    </div>
</div>
@endsection
