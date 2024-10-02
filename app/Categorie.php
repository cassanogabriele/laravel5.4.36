<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public $timestamps = false;
	
	// variable protégée : on place tous les attributs qui pourront être remplis sans soucis de sécurité particuliers.
	protected $fillable = ['titre_category', 'texte', 'categorie_id'];
	// On doit faire une fonction pour faire la relation avec le modèle Blog.php
	public function blogposts(){
		// hasMany : a plusieurs (une catégorie peut avoir plusieurs posts de blog).
		return $this->hasMany('App\Blog');
	}
}
