<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgencyTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agency_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->string('address');
            $table->longText('description')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['agency_id', 'locale']);
            $table->foreign('agency_id')
                    ->references('id')
                    ->on('agencies')
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
        Schema::dropIfExists('agency_translations');
    }
}
