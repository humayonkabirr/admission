<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrimarySelectionCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_selection_criterias', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('primary_criteria_name');
          $table->bigInteger('circular_id');
          $table->bigInteger('division_id')->nullable();
          $table->bigInteger('district_id')->nullable();
          $table->bigInteger('upazila_id')->nullable();
          $table->string('last_gpa')->nullable();
          $table->bigInteger('family_status_id')->nullable();
          $table->bigInteger('family_member')->nullable();
          $table->boolean('active')->default(0);
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
        Schema::dropIfExists('primary_selection_criterias');
    }
}
