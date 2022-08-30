<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersDados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_dados', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->string('telefone', 250)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('endereco', 250)->nullable();
            $table->string('numero', 50)->nullable();
            $table->string('bairro', 250)->nullable();
            $table->string('complemento', 250)->nullable();
            $table->string('cidade', 250)->nullable();
            $table->string('estado', 250)->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at');
            $table->string('created_from', 250)->nullable();
            $table->string('updated_from', 250)->nullable();
            $table->string('deleted_from', 250)->nullable();
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
