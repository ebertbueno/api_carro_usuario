<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Carros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->id();
            $table->string('hash_id', 250);
            $table->integer('users_id')->nullable();
            $table->string('ativo', 1)->nullable();
            $table->string('tipo', 250)->nullable();
            $table->string('nome', 250)->nullable();
            $table->integer('ano_fabricacao')->nullable();
            $table->integer('ano_veiculo')->nullable();
            $table->string('cambio', 250)->nullable();
            $table->string('km', 250)->nullable();
            $table->string('placa', 10)->nullable();
            $table->string('cor', 250)->nullable();
            $table->string('carroceria', 250)->nullable();
            $table->integer('portas')->nullable();
            $table->string('motorizacao', 250)->nullable();
            $table->string('combustivel', 250)->nullable();
            $table->string('chassi', 250)->nullable();
            $table->string('renavam', 250)->nullable();
            $table->string('montadora', 250)->nullable();
            $table->string('modelo', 250)->nullable();
            $table->string('versao', 250)->nullable();
            $table->double('valor_vista', 8, 2)->nullable();
            $table->double('valor_prazo', 8, 2)->nullable();
            $table->double('valor_compra', 8, 2)->nullable();
            $table->date('data_compra')->nullable();
            $table->longText('observacoes')->nullable();
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
