<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->string('sector')->nullable();
            $table->string('avatar')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('horarios')->nullable();
            $table->string('category')->nullable();
            $table->string('phone')->nullable();
            $table->integer('verificado')->default(0);
            $table->integer('rating')->default(0);
            $table->integer('sum_rating')->default(0);
            $table->integer('gifts')->default(0);
            $table->integer('claimed')->default(0);
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
        Schema::dropIfExists('stores');
    }
}
