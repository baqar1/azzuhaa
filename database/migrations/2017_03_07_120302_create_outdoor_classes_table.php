<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutdoorClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outdoor_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class_name', 100);
            $table->string('place')->nullable();
            $table->string('other_description')->nullable();
            $table->string('contactInfo')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outdoor_classes');
    }
}
