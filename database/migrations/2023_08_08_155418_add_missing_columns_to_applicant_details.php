<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicant_details', function (Blueprint $table) {
            //
            $table->string('ward_recommendation_image');
            $table->string('health_examination_report');
            $table->string('full_size_photo');
            $table->string('video')->nullable();
            $table->string('citizenship_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applicant_details', function (Blueprint $table) {
            //
        });
    }
};
