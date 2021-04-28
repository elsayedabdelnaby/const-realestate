<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            // boolean values
            $table->tinyInteger('is_active')->default(1)->comment('0 => inactive , 1 => active'); // edit in mysql to be 1 and enum
            $table->tinyInteger('rent_sale')->default(1)->comment('0 => sale , 1 => rent'); // edit in mysql to be 1 and enum
            $table->tinyInteger('is_featured')->default(1)->comment('0 => false , 1 => true'); // edit in mysql to be 1 and enum
            $table->tinyInteger('add_to_home')->default(1)->comment('0 => false , 1 => true'); // edit in mysql to be 1 and enum
            // address
            $table->decimal('latitude', 17 , 15)->nullable();
            $table->decimal('longitude', 17 , 15)->nullable();
            $table->integer('city_id')->unsigned();
            $table->integer('country_id')->unsigned();
            // features
            $table->integer('rooms')->default(0);
            $table->integer('bedrooms')->default(0);
            $table->integer('bathrooms')->default(0);
            $table->integer('garages')->default(0);
            $table->integer('plot_area')->default(0);
            $table->integer('construction_area')->default(0);
            $table->integer('price')->default(0);
            // foreign keys
            $table->integer('currency_id')->unsigned();
            $table->integer('property_type_id')->unsigned();
            $table->integer('property_status_id')->unsigned();
            $table->integer('agency_id')->unsigned();
            //file
            $table->string('image')->default('default.png');
            $table->string('floor_plan')->default('default.png');
            $table->string('video')->nullable();
            $table->string('gallery')->nullable();
            //timestamps
            $table->softDeletes();
            $table->timestamps();
            // foreign keys relation
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

            $table->foreign('property_type_id')
                    ->references('id')
                    ->on('property_types')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('property_status_id')
                    ->references('id')
                    ->on('property_statuses')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('agency_id')
                    ->references('id')
                    ->on('agencies')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('currency_id')
                    ->references('id')
                    ->on('currencies')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
