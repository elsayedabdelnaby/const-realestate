<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyStatusTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_status_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_status_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['property_status_id', 'locale']);
            $table->foreign('property_status_id')
                    ->references('id')
                    ->on('property_statuses')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_status_translations');
    }
}
