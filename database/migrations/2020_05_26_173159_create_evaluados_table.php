<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluados', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->notnullable();
            $table->string('cargo',30)->nullable();
            $table->string('word_key',20)->nullable();
            $table->boolean('status')->default(0);
            $table->string('filename')->nullable();
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
        Schema::dropIfExists('evaluados');
    }
}
