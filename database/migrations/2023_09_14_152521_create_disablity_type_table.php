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
        Schema::create('disablity_type', function (Blueprint $table) {
            $table->id();
            $table->string('name_nepali')->nullable();
            $table->string('name_english')->nullable();
            $table->string('points')->nullable();
            $table->string('color')->nullable();
            $table->enum('type', ['nature_of_disability', 'severity_of_disability'])->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('disablity_type');
    }
};
