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
            $table->unsignedBigInteger('disability_type_id')->nullable();
            $table->unsignedBigInteger('incapacitated_base_disability_type_id')->nullable();
            $table->foreign('disability_type_id')
                ->references('id')
                ->on('disablity_type')
                ->onDelete('cascade');

            $table->foreign('incapacitated_base_disability_type_id')
                ->references('id')
                ->on('disablity_type')
                ->onDelete('cascade');
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
            $table->dropForeign(['disability_type_id']);
            $table->dropForeign(['incapacitated_base_disability_type_id']);
        });
    }
};
