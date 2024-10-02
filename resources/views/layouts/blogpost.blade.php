@extends('layouts.master')

@section('header')
<h1 style="text-align:center;font-family:Brush Script MT, Brush Script Std, cursive;font-size:85px;">I LOVE MOVIES</h1> 
<p style="text-align: center;margin-top:50px;" class="center-block"><img src="http://fr.web.img6.acsta.net/c_215_290/pictures/18/09/19/14/32/4251359.jpg" alt="halloween"></p>
@stop

@section('contenu')

<h1>
	{{ $blog->titre }}
</h1>

<p>
	{{ $blog->texte }}

</p>
{{ $blog->created_at }}
@stop