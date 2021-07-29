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
            $table->integer('property_size');
            $table->text('facing');
            $table->integer('floor_no');
            $table->tinyInteger('floor_type');
            $table->tinyInteger('dining_type');
            $table->integer('price');
            $table->integer('service_charge')->default(0);
            $table->integer('available_from');
            $table->string('preferred_rental')->nullable();
            $table->longText('details')->nullable();
            $table->integer('image')->nullable();
            $table->tinyInteger('district');
            $table->integer('area');
            $table->string('sector')->nullable();
            $table->string('road')->nullable();
            $table->string('house')->nullable();
            $table->boolean('cctv')->default(false);
            $table->boolean('electricity_included')->default(false);
            $table->boolean('gas')->default(false);
            $table->boolean('gas_included')->default(false);
            $table->boolean('generator')->default(false);
            $table->boolean('guard')->default(false);
            $table->boolean('lift')->default(false);
            $table->boolean('negotiable')->default(false);
            $table->boolean('parking')->default(false);
            $table->boolean('wifi')->default(false);
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
