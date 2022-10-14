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
        Schema::create('cadastros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome')->nullable();
            $table->string('cpf')->nullable();
            $table->string('endereco')->nullable();
            $table->date('nascimento')->nullable();
            $table->integer('sexo')->nullable();
            $table->string('estado')->nullable();
            $table->string('cidade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cadastros');
    }
};
