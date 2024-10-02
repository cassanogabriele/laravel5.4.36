<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	// Pour arranger un peu le modèle de Categorie, on peut rajouter une dernière ligne. A chaque fois qu'on crée une table, cela rajoute par défaut des timestamps.
	// On va les supprimer car pour les catégories, on en a pas besoin.
	public $timestamps = true;	
	
    // On va saisir quelques éléments à l'intérieur de la classe

    // On met à l'intérieur de cette propriété 2 fichiers, n'importe quel utilisateur pourra mettre à 
    //jour comme il le souhaite, tous les éléments qui peuvent être mis à jour sans risque. Une 
    //propriété qui dirait que l'utilisateur est administrateur ne serait pas fillable.
	protected $fillable = ['titre', 'texte', 'categorie_id'];
	// Un poste de blog n'aura qu'une seul catégorie -> relation inverse à celle du modèle Categorie.php.
	public function categorie(){
		return $$this->belongsTo("App\Categorie");
	}
	
	public function path() {
        return "/blog/{$this->slug}";
	}	
	
	public function user(){
	   return $this->belongsTo(User::class);
    }
	
  	public function blog(){
	    return $this->belongsTo(Blog::class);
    }
	
	public function comments(){
		return $this->hasMany(Comment::class);
	}
}
