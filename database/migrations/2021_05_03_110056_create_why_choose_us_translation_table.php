<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhyChooseUsTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('why_choose_us_translation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('why_choose_us_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['why_choose_us_id', 'locale']);
            $table->foreign('why_choose_us_id')
                ->references('id')
                ->on('why_choose_us')
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
        Schema::dropIfExists('why_choose_us_translation');
    }
}
