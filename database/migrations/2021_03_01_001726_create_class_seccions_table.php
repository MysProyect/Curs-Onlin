<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassSeccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_seccions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('class_id');
            $table->integer('seccion');
            $table->string('file')->nullable();
            $table->string('name_file')->nullable();
            // $table->string('audio')->nullable();
            // $table->string('doc')->nullable();
            $table->string('texto')->nullable();
            $table->string('url')->nullable();
            $table->integer('user_created');
            $table->integer('user_updated')->nullable();
            $table->timestamps();

            
            $table->foreign('class_id')->references('id')->on('classes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_seccions');
    }
}
