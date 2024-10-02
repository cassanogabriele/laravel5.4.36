<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Convention de Laravel : nom du modèle au pluriel pour le nom des tables et sans majuscule.
		Schema::create('categories', function (Blueprint $table) {
			$table->increments('id');
			$table->string('titre_categorie');			
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::drop('categories');		
    }
}
