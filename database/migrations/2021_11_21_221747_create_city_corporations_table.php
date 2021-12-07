<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityCorporationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_corporations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('city_corp_name')->unique()->nullable();
            $table->string('city_corp_name_en')->unique()->nullable();
            $table->unsignedBigInteger('district_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_corporations');
    }
}
