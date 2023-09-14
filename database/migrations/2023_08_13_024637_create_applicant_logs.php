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
        Schema::create('applicant_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('applicant_id')->nullable();
            $table->enum('state', ['ward', 'admin', 'all_approved'])->nullable();
            $table->enum('status', ['new', 'admin_approved', 'approved', 'rejected'])->nullable();
            $table->string('remarks')->nullable();
            $table->integer('created_by')->nullable();
            $table->string('review_status')->nullable();
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
        Schema::dropIfExists('applicant_logs');
    }
};
