<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('registration')->nullable();
            $table->string('year')->nullable();
            $table->string('price')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('make_id')->nullable();      
            $table->string('check_out_by')->nullable();
            $table->timestamp('check_out_time')->nullable();
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
        Schema::dropIfExists('cars');
    }
}
