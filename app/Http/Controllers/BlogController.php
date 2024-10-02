<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Blog;
// Les modèles sont maintenant disponibles.
use App\Categorie;

use Illuminate\Support\Facades\Input;

class BlogController extends Controller
{
    // Cette fonction renvoie vers la vue "Layouts/Blog"
	public function index(){
		// Variable qui récupère tous les modèles Blog.
		$posts=Blog::All();
		// On va faire pareil avec le modèle Categorie
		$categories=Categorie::All();
		
		return view("layouts/blog")->with(array(
			"blogs" => $posts,
			"categories" => $categories,
			"auteur" => 'I LOVE MOVIES'
			));
	}

	public function post_unique($id){
		$post=Blog::find($id);
		// Il faut créer une autre vue pour afficher un post par page.
		return view("layouts/blogpost")->with(array(
			"blog" => $post
		));
	}
	
	public function nouveau_blog(){
		$categories = Categorie::pluck('titre_categorie','id')->prepend('-------');
		return view('layouts.nouveau')->with(array("categories"=>$categories));
	}
	
	// Enregistre les nouveaux articles dans la base de données. 
	public function creation_blog(){
		// La méthode "create" permet d'insérer les données du formulaire dans la base de données.
		$blog = Blog::create(Input::all());
		
		return redirect('/blog/' .$blog->id);
	}
	
	
	// Editer les articles 
	public function edition_post($id){
		$categories = Categorie::pluck('titre_categorie','id')->prepend('-------');
		$blog = Blog::find($id);
		return view('layouts.edition')->with(array("categories"=>$categories, "blog" => $blog));
	}
	
	// Il faut valider l'édition d'article.
	public function edition_valider(Request $request, $id){
		// Il faut trouver l'id de l'article.
		$blog_a_editer = Blog::find($id);
		// Une fois qu'on l'a trouvé, il faut mettre à jour.
		$blog_a_editer->update(Input::All());
		
		return redirect('/blog/'.$blog_a_editer->id)->withSuccess('Le billet de blog a bien été édité');;		
	}
	
	// Suppression
	public function suppression_post($id){	
		$blog_a_supprimer = Blog::find($id);
		$blog_a_supprimer->delete();
		
		return redirect('/')->withSuccess('Le billet de blog a bien été supprimé');		
	}
	
}
