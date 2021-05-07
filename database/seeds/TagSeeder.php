<?php

use App\Models\Tag;
use App\Models\TagTranslation;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new Tag();
        $tag->save();

        $tag_translation = new TagTranslation();
        $tag_translation->tag_id = $tag->id;
        $tag_translation->locale = 'en';
        $tag_translation->name = 'Houses';
        $tag_translation->save();

        $tag_translation = new TagTranslation();
        $tag_translation->tag_id = $tag->id;
        $tag_translation->locale = 'ar';
        $tag_translation->name = 'منازل';
        $tag_translation->save();

    }
}
