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
        Schema::create('elibraries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('penulis');
            $table->string('tahun');
            $table->foreignId('folder_id');
            $table->string('file_buku');
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
        Schema::dropIfExists('elibraries');
    }
};
