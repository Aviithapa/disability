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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('name_nepali')->nullable();
            $table->string('name_english')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('designation')->nullable();
            $table->enum('status', ['active', 'in-active'])->nullable();
            $table->string('red_signature')->nullable();
            $table->string('black_signature')->nullable();
            $table->string('stamp')->nullable();
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
        Schema::dropIfExists('employee');
    }
};
