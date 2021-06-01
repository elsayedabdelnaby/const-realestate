<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsActiveAndShowInPopularTagsColumnsToTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->boolean('is_active');
            $table->boolean('is_popular_tag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('popular_tags_columns_to_tags', function (Blueprint $table) {
            $table->dropColumn('is_popular_tag');
            $table->dropColumn('is_active');
        });
    }
}
