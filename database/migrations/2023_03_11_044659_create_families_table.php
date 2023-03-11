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
        Schema::create('families', function (Blueprint $table) {
            $table->id('id_family');
            $table->string('nama', 75);
            $table->string('alamat');
            $table->string('phone', 20);
            $table->string('tempat_lahir', 30);
            $table->string('tanggal_lahir', 10);
            $table->string('agama', 10);
            $table->string('pekerjaan', 50);
            $table->string('pendidikan', 10);
            $table->enum('jenis_kelamin', ['L', 'P']);
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
        Schema::dropIfExists('families');
    }
};
