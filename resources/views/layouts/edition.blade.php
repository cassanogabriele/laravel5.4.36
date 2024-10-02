@extends('layouts.master')

@section('header')

<h1 style="text-align:center;font-family:Brush Script MT, Brush Script Std, cursive;font-style:22px;">Modifier le billet</h1>

@stop


@section('contenu')

{{ Form::model($blog, array('url' => '/edit/'.$blog->id, "method" => 'put', "class" => 'form form-vertical')) }}

@include('layouts.forms.creer_ou_editer')

{{ Form::close() }}
@stop

