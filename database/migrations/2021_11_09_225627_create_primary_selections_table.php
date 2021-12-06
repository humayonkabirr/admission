<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrimarySelectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_selections', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('app_number')->unique();
          $table->string('user_id_no');
          $table->string('student_name');
          $table->string('brid');
          $table->string('father_name');
          $table->string('father_nid')->nullable();
          $table->string('mother_name');
          $table->string('mother_nid')->nullable();
          $table->bigInteger('education_institute_id')->nullable();
          $table->bigInteger('academic_level_id')->nullable();
          $table->bigInteger('admission_class_id')->nullable();
          $table->bigInteger('eiin_id')->nullable();
          $table->bigInteger('division_id');
          $table->bigInteger('district_id');
          $table->bigInteger('upazila_id');

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
        Schema::dropIfExists('primary_selections');
    }
}
