<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['web']], function() {
	Route::get('/', 'BlogController@index');
	/* 
	On rajoute la route pour le lien vers une page personnalisée par post. Pour bien s'assurer que l'id n'est composé que de chiffre et pas de lettre on va utiliser 
	un "where" en mettant des conditions
	*/
	Route::get('/blog/{id}', 'BlogController@post_unique')->where('id', '[0-9]+');

	Route::get('/categorie/{id}', 'CategorieController@categorie_unique')->where('id', '[0-9]+');

	Route::get('ounoustrouver', function(){
		return 'ceci est la page ou nous trouver';
	});

	// Si on veut récupérer l'id d'un utilisateur dans l'url. Le soucis, c'est que comme ça, on pourra 
	// entrer autre chose qu'un chiffre dans l'url. 
	Route::get('utilisateur/{id}', function($id){
		return 'Uitlisateur n°'.$id;
	})
	// Il faut donc se débrouiller pour que les paramètres dans l'url soient uniquement des chiffres. 
	->where('id', '[0-9]+');

	// Pour afficher le formulaire.
	Route::get('/nouveau', ['middleware' => 'auth', 'uses' => 'BlogController@nouveau_blog']);
	// Pour enregistrer les données saisies.
	Route::post('/creation', ['middleware' => 'auth', 'uses' =>'BlogController@creation_blog']);
	// Pour éditer un poste 
	Route::get('/edition/{id}', 'BlogController@edition_post')->where('id', '[0-9]+');
	Route::put('/edit/{id}', 'BlogController@edition_valider');
	// Suppression.	
	Route::get('/suppression/{id}', 'BlogController@suppression_post')->where('id', '[0-9]+');
	// Login
	Route::auth();
	Route::get('/logout', 'Auth\LoginController@logout'); 
	// Commentaires 
	Route::post('{blog}/comments', 'CommentsController@store');	
	Route::get('/edition_comm/{id}', 'CommentsController@edition_comm')->where('id', '[0-9]+');
	Route::put('/editcomm/{id}', 'CommentsController@editioncomm_valider');
    Route::delete('{blog}/{comments}', 'CommentsController@destroy');
});
//Auth::routes();



