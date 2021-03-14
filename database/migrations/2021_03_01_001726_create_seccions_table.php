<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('clase_id')->nullable();
            $table->integer('seccion');
            $table->string('file')->nullable();
            $table->string('name_file')->nullable();
            $table->string('texto')->nullable();
            $table->string('url')->nullable();
            $table->integer('visibility')->nullable();
            $table->integer('user_created');
            $table->integer('user_updated')->nullable();
            $table->timestamps();

            
            $table->foreign('clase_id')->references('id')->on('clases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seccions');
    }
}
