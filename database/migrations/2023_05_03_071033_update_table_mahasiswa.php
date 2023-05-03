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
        if (Schema::hasColumn('mahasiswas', 'id_prodi')) {
            Schema::table('mahasiswas', function (Blueprint $table) {
                $table->dropForeign('id_prodi');
                $table->dropColumn('id_prodi');
            });
        }
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_prodi')->nullable()->after('id');
            $table->foreign('id_prodi')->references('prodi_id')->on('prodis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->dropForeign('id_prodi');
            $table->dropColumn('id_prodi');
        });
    }
};
