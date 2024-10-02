@extends('layouts.master')

@section('header')

<h1 style="text-align:center;font-family:Brush Script MT, Brush Script Std, cursive;font-style:22px;">Modifier le commentaire</h1>

@stop

@section('contenu')

<?php 
// echo $comments->id;
?>

{{ Form::model($comments, array('url' => '/editcomm/'.$comments->id, "method" => 'put', "class" => 'form form-vertical')) }}

@include('layouts.forms.editer_commentaire')

{{ Form::close() }}
@stop

