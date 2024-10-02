<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Categorie;

class CategorieController extends Controller
{
    // Méthode qui servira à afficher quelque chose dans la page
	public function categorie_unique($id){
		// On va récupérer tous les posts relatifs à la catégorie.
		$categorie = Categorie::find($id)->blogposts;
		
		return view("layouts/categorie")->with(
			array(
				"categories"=>$categorie
			)	
		);
	}
}
