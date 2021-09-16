<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEdisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edisis', function (Blueprint $table) {
            $table->bigIncrements('id_edisi');
            $table->string('tema')->nullable();
            $table->string('nama_edisi')->unique();
            $table->string('gambar');
            $table->date('tahun_terbit');
            $table->string('issn');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edisis');
    }
}
