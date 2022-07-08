<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('ticket_id')->unique();
            $table->integer('user_id')->unsigned();
            $table->string('email');
            $table->string('telefone');
            $table->string('assunto');
            $table->text('descritivo');
            $table->string('data');
            $table->string('hora');
            $table->string('abertura');
            $table->string('ticket_priority');
            $table->string('categoria');
            $table->string('status');
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
        Schema::dropIfExists('tickets');
    }
};
