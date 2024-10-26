<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbArsipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_arsip', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('nama_file'); // Nama file
            $table->string('extention_file', 10); // Ekstensi file
            $table->integer('size_file'); // Ukuran file dalam byte
            $table->string('path_file'); // Path file
            $table->timestamps(); // Menambahkan created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_arsip');
    }
}
