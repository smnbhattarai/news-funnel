<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewsUserMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_user', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('source');
            $table->text('description')->nullable();
            $table->text('url')->nullable();
            $table->text('imageUrl')->nullable();
            $table->text('newsPublishedAt')->nullable();
            $table->text('newsContent')->nullable();
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
        Schema::dropIfExists('news_user');
    }
}
