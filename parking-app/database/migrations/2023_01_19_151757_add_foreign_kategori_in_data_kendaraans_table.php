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
        Schema::table('data_kendaraans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kategori')->after('id');
            $table->foreign('id_kategori')->references('id')->on('kategoris');
            $table->unsignedBigInteger('id_user')->after('bayar');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_kendaraans', function (Blueprint $table) {
            $table->dropForeign(['id_kategori']);
            $table->dropColumn('id_kategori');
            $table->dropForeign(['id_user']);
            $table->dropColumn('id_user');
        });
    }
};
