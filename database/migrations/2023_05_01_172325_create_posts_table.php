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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->default('');
            $table->text('content')->nullable();
            $table->string('excerpt')->nullable()->default('');
            $table->string('image')->nullable()->default('');
            $table->string('logo_image')->nullable()->default('');
            $table->enum('type', ['homepage_banner', 'testimonial', 'content', 'news', 'partner', 'steps', 'services', 'packages', 'work', 'team', 'pages', 'about', 'client', 'products', 'portfolio', 'post'])->nullable();
            $table->string('slug')->nullable()->default('');
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
        Schema::dropIfExists('posts');
    }
};
