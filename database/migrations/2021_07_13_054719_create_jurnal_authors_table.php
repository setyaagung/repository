<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurnalAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_authors', function (Blueprint $table) {
            $table->bigIncrements('id_jurnal_author');
            $table->unsignedBigInteger('id_jurnal');
            $table->unsignedBigInteger('id_author');
            $table->timestamps();

            $table->foreign('id_jurnal')->references('id_jurnal')->on('jurnals')->onDelete('cascade');
            $table->foreign('id_author')->references('id_author')->on('authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnal_authors');
    }
}
