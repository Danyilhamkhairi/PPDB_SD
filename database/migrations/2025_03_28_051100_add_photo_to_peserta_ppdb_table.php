<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhotoToPesertaPpdbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Kolom 'foto' sudah ada di tabel, jadi tidak perlu ditambahkan lagi
        // Bisa dikosongkan untuk mencegah error
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Karena kita tidak menambahkan kolom di up(), tidak perlu menghapus apa-apa di sini
    }
}
