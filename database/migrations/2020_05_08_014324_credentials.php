<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Credentials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credentials', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('store_id')->unsigned();
            $table->foreign('store_id')->references('id')->on('stores');
            $table->string('access_token');
            $table->string('token_type');
            $table->string('expires_in');
            $table->string('scope');
            $table->string('refresh_token');
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
        //
    }
}
