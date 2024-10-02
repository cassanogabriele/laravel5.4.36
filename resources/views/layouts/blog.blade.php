@extends('layouts.master')

@section('header')
<!-- On affiche la variable "auteur" -->
<h1 style="text-align:center;font-family:Brush Script MT, Brush Script Std, cursive;">{{ $auteur }}</h1> 
<p style="text-align: center;margin-top:50px;" class="center-block"><img src="http://fr.web.img6.acsta.net/c_215_290/pictures/18/09/19/14/32/4251359.jpg" alt="halloween"></p>

@stop

@section('contenu')
<!-- On va utiliser un foreach pour afficher tous les posts. -->
@foreach($blogs as $blog)
<!-- On utilise du code HTML pour afficher les posts. On affiche le numéro du post et le titre. -->

<h3>
	<!-- On va faire un lien autour du titre. On définit l'url avec la fonction "url" de Laravel. -->
	<a href="{{ url('blog/'. $blog->id ) }}">
		{{ $blog->titre }}
	</a>
</h3>

<blockquote> {{ $blog->texte }}</blockquote>

@if(Auth::check())
<a href="{{ url('/edition/' .$blog->id) }}" class="btn btn-info"> Editer</a>
<a href="{{ url('/suppression/' .$blog->id) }}" class="btn btn-danger"> Supprimer</a>

<hr>
@auth()
<form class="mt-5" action="{{ url("{$blog->path()}comments") }}" method="POST">
    {{ csrf_field() }}
   
	<div class="form-group">	
        <input style="display:none;" type="text" name="blog_id" id="blog_id" value="{{ $blog->id }}" cols="70" rows="3"></input>
    </div>
	
	<div class="form-group">
        <textarea name="body" placeholder="Votre commentaire..." cols="70" rows="3">{{ old('body') }}</textarea>
    </div>
	
    <button class="btn btn-success">Commenter</button>
 </form>
 @endauth
 <hr>
 <div class="card mt-5">
    @foreach($blog->comments()->latest()->get() as $comment)
    <div class="d-flex justify-content-between">
        <div>
           <strong>Utilisateur : {{ $comment->user->name }}</strong>  
        </div>
		
		<div>
			<strong>Envoyé il y a : {{ $comment->created_at->diffForHumans() }}</strong>
		</div>
		
		<hr>
    </div>

    <div class="card-body">
		<b>Commentaire :</b>  {{ $comment->body }}
    </div>
	
	<div>
        <form method="POST" action="{{ url("{$blog->path()}{$comment->id}") }}">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<div class="form-group">	
				<input type="text" style="display:none;" name="comment_id" id="comment_id" value="{{ $comment->id }}" cols="70" rows="3"></input>
			</div>	
			
			<a href="{{ url('/edition_comm/' .$comment->id) }}" class="btn btn-info btn-xs"> Editer</a> 
            <button class="btn btn-danger btn-xs">Supprimer</button>			
         </form>	
     </div>
    @endforeach
</div>

<hr>
@endif

<!-- Fin du foreach -->
@endforeach

@stop

@section('aside')

@include('layouts.authentifie')

<h3>Categories</h3>

@foreach($categories as $categorie)

<p>
	<a href="{{ url('categorie/'. $categorie->id ) }}">
		{{ $categorie->titre_categorie }}

	</a>
</p>

@endforeach

@stop