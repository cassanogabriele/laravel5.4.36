@extends('layouts.master')

@section('header')
	@parent

    <p><h1 style="text-align:center;font-family:Brush Script MT, Brush Script Std, cursive;">I LOVE MOVIES</h1></p>
	<p style="text-align: center;margin-top:50px;" class="center-block"><img src="http://fr.web.img6.acsta.net/c_215_290/pictures/18/09/19/14/32/4251359.jpg" alt="halloween"></p>
@stop

@section('contenu')

@foreach($categories as $categorie)

<h3>
	<a href="{{ url('blog/'. $categorie->id) }}">
		{{ $categorie->titre }}
	</a>
</h3>

<blockquote>{{ $categorie->texte }}</blockquote>

@endforeach

@stop