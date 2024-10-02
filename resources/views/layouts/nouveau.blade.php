@extends('layouts.master')

@section('header')

<h1 style="text-align:center;font-family:Brush Script MT, Brush Script Std, cursive;font-style:22px;">Un nouveau billet</h1>

@stop

@section('contenu')

{{ Form::open(array('url' => '/creation')) }}

@include('layouts.forms.creer_ou_editer')

{{ Form::close() }}
@stop

