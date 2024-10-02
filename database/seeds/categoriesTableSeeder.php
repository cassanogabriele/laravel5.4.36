<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('categories')->delete();

    	$faker = Faker\Factory::create();


    	for($i = 0; $i < 10; ++$i)
    	{
    		DB::table('categories')->insert([
    			'titre_categorie' => $faker->text(10)    			
    		]);
    	}
    }




}

