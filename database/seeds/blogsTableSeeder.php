<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class blogsTableSeeder extends Seeder
{

	private function dateAleatoire()
	{
		return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
	}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('blogs')->delete();

    	$faker = Faker\Factory::create();


    	for($i = 0; $i < 30; ++$i)
    	{
    		$date = $this->dateAleatoire();

    		DB::table('blogs')->insert([
    			'titre' => $faker->text(50),
    			'texte' => $faker->text,  
    			'created_at' => $date,
				
				'categorie_id'=> $faker->numberBetween(1,10),
				
    			'updated_at' => $date
    			]);
    	}
    }




}

