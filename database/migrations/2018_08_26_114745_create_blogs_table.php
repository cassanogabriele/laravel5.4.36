<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // Une classe de migration contient deux méthodes, la méthode up dans laquelle on 
    // met le nom de la table // et certains éléments. 
    public function up()
    {
        // Il faut implémenter une façade : on va recopier son implémentation dans une 
        // autre migration.On a deux qui sont installées au moment de l'installation 
        //de celle-ci, on va prendre une des deux et la copier et modifier les 
        //informations.

        // Le premier argument est le nom de la table, le deuxième argument est une 
        // fonction de rappel qui prend en argument un objet "Blueprint", ensuite on 
        //spécifie les différents champs.
        Schema::create('blogs', function (Blueprint $table) {
			$table->increments('id');
			$table->string('titre');
			$table->text('texte');
			// unsigned : propriété SQL qui permet, si la base de données stocke uniquement des valeurs supérieurs à 0, ça va doubler la capacité
			// de stockage. nullable : un post de blog pourrait ne pas avoir de catégorie.
			$table->integer('categorie_id')->unsigned()->nullable;
			// Création de la référence, stockage d'une clé étrangère. 
			$table->foreign('categorie_id')->references('id')->on('categories');
			
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       // Schema::drop('blogs');
    }
}
