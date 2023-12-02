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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->string('country')->nullable();
            $table->string('brand')->nullable();
            $table->string('aroma')->nullable();
            $table->string('release')->nullable();
            $table->string('pack')->nullable();
            $table->string('model')->nullable();
            $table->string('series')->nullable();
            $table->unsignedInteger('news')->nullable();
            $table->unsignedInteger('hits')->nullable();
            $table->unsignedInteger('promo')->nullable();
            $table->unsignedInteger('density')->nullable();
            $table->unsignedInteger('ph')->nullable();
            $table->string('image1')->default('media/product/empty-image.png');
            $table->string('image2')->default('media/product/empty-image.png');
            $table->unsignedInteger('weight')->nullable();
            $table->unsignedInteger('volume')->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->unsignedInteger('amount')->nullable();
            $table->unsignedInteger('status')->default(1);
            $table->unsignedInteger('price')->nullable();
            $table->text('desc')->nullable();
            $table->text('about')->nullable();
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
        Schema::dropIfExists('products');
    }
};
