<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residences', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type');
            $table->tinyInteger('category');
            $table->integer('owner_id');
            $table->string('location');
            $table->integer('size');
            $table->text('facing');
            $table->integer('floor_no');
            $table->tinyInteger('floor_type');
            $table->tinyInteger('dinning_type');
            $table->integer('price');
            $table->integer('service_charge')->default(0);
            $table->string('price_options');
            $table->integer('available_from');
            $table->string('preferred_rental')->nullable();
            $table->longText('details')->nullable();
            $table->string('other_facilities')->nullable();
            $table->integer('image')->nullable();
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
        Schema::dropIfExists('residences');
    }
}
