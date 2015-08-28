<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('categories')->delete();

		// QuiltingCatSeed
		Category::create(array(
				'category' => 'Quilting Machines',
				'cat_desc' => 'Quilting machines by The Grace Company',
				'cat_meta_title' => 'Quilting Machines',
				'cat_meta_desc' => 'Quilting machines by The Grace Company'
			));

		// HandQuiltingFrameSeed
		Category::create(array(
				'category' => 'Hand Quilting Frame',
				'cat_desc' => 'Hand Quilting Frame by The Grace Company',
				'cat_meta_title' => 'Hand Quilting Frame',
				'cat_meta_desc' => 'Hand Quilting Frame by The Grace Company'
			));
	}
}