<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('latitude', 17 , 15)->nullable();
            $table->decimal('longitude', 17 , 15)->nullable();
            $table->integer('city_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->integer('office_number')->nullable();
            $table->integer('mobile')->nullable();
            $table->integer('fax')->nullable();
            $table->string('email')->unique();
            $table->string('image')->default('default.png');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agencies');
    }
}
