<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('judul'); 
            $table->year('tahun_terbit'); 
            $table->string('penulis')->nullable();
            $table->longText('deskripsi'); 
            $table->timestamps(); 
        });
    }


    public function down()
    {
        Schema::dropIfExists('bukus');
    }
}
