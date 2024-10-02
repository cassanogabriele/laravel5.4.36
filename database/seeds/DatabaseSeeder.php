<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		$this->call(categoriesTableSeeder::class);
		$this->call(blogsTableSeeder::class);
    }
}

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