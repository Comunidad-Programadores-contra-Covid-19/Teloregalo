<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMailSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_mail_sends', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('offer_id');
            $table->foreign('offer_id')->references('id')->on('offers');

            $table->string('name', 100);

            $table->string('email', 100);



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
        Schema::dropIfExists('user_mail_sends');
    }
}
