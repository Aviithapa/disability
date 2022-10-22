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
        Schema::create('applicant_details', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('full_name_nep')->nullable();
            $table->enum('sex', ['male','female','other'])->nullable()->default('male');
            $table->integer('age');
            $table->string('pardesh')->nullable();
            $table->string('permanant_address')->nullable();
            $table->string('temporary_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('guardian')->nullable();
            $table->string('relation')->nullable();
            $table->string('guardian_number')->nullable();
            $table->string('disability_type')->nullable();
            $table->string('incapacitated_base_disability_type')->nullable();
            $table->text('disability_description')->nullable();
            $table->text('daily_effected_description')->nullable();
            $table->string('disability_cause')->nullable();
            $table->enum('material_used', ['Yes','No'])->nullable()->default('Yes');
            $table->string('material_used_description')->nullable();
            $table->enum('already_material_used', ['Yes','No'])->nullable()->default('Yes');
            $table->string('material_used_name')->nullable();
            $table->string('daily_work_without_other_help')->nullable();
            $table->string('daily_work_with_other_help')->nullable();
            $table->string('education_level')->nullable();
            $table->string('trainning_name')->nullable();
            $table->string('current_work')->nullable();
            $table->date('applied_date')->nullable();
            $table->string('photo')->nullable();
            $table->string('IdNumber')->nullable();
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
        Schema::dropIfExists('applicant_details');
    }
};
