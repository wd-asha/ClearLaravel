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
        Schema::table('products', function (Blueprint $table) {
            $table->string('forma')->nullable();
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->string('purpose')->nullable();
            $table->string('washing')->nullable();
            $table->string('depth')->nullable();
            $table->string('arm')->nullable();
            $table->string('machine')->nullable();
            $table->string('bracing')->nullable();
            $table->string('mop')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('forma');
            $table->dropColumn('material');
            $table->dropColumn('color');
            $table->dropColumn('purpose');
            $table->dropColumn('washing');
            $table->dropColumn('depth');
            $table->dropColumn('arm');
            $table->dropColumn('machine');
            $table->dropColumn('bracing');
            $table->dropColumn('mop');
        });
    }
};
