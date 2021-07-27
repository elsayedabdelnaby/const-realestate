<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('agency_id')->nullable();
            $table->string('image');
            $table->integer('area_from');
            $table->integer('area_to');
            $table->integer('meter_price')->default(0);
            $table->integer('price_from')->default(0);
            $table->integer('price_to')->default(0);
            $table->integer('downpayment')->nullable();
            $table->integer('installments_years')->nullable();
            $table->string('video_link');
            $table->string('google_map_link')->nullable();
            $table->decimal('latitude', 17, 15)->nullable();
            $table->decimal('longitude', 17, 15)->nullable();
            $table->integer('city_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->boolean('is_active')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('finish_status')->default(0);
            $table->longText('gallery')->nullable();
            $table->longText('sketches')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('projects');
    }
}
