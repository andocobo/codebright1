@extends('layout')
@section("content")
    <form action="{{ action('UserController@handleLogin') }}" method="post" role="form">
        
        <div class="form-group @if($errors->has()) has-error @endif">
            {{ Form::label("username", "Username", array('class'=>'control-label')) }}
            {{ Form::text("username", Input::old("username"), [
                'placeholder' => 'Enter username', 
                'class'=>'form-control'
            ]) }}

        </div>
        
        <div class="form-group @if($errors->has()) has-error @endif">
            {{ Form::label("password", "Password", ['class'=>'control-label']) }}
            {{ Form::password("password", [
                'placeholder' => '●●●●●●●●●●',
                'class'=>'form-control'
            ]) }}

            <span class="help-block error">{{ $errors->first() }}</span>
        </div>

        
        {{ Form::submit("login", ['class'=>'btn btn-primary']) }}
        
    {{ Form::close() }}
@stop