<?php

use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->save();

        $category_translation = new CategoryTranslation();
        $category_translation->category_id = $category->id;
        $category_translation->locale = 'en';
        $category_translation->name = 'Houses';
        $category_translation->save();

        $category_translation = new CategoryTranslation();
        $category_translation->category_id = $category->id;
        $category_translation->locale = 'ar';
        $category_translation->name = 'منازل';
        $category_translation->save();

        $category = new Category();
        $category->save();

        $category_translation = new CategoryTranslation();
        $category_translation->category_id = $category->id;
        $category_translation->locale = 'en';
        $category_translation->name = 'Garages';
        $category_translation->save();

        $category_translation = new CategoryTranslation();
        $category_translation->category_id = $category->id;
        $category_translation->locale = 'ar';
        $category_translation->name = 'المرائب';
        $category_translation->save();
    }
}
