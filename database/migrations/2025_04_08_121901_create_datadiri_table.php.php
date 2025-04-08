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
        Schema::create('datadiri', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->string('nuptk_nip');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('status_kawin');
            $table->text('alamat_ktp');
            $table->string('no_hp');
            $table->string('email');
            $table->string('foto')->nullable();
            $table->string('scan_ktp')->nullable();
            $table->timestamps(); // otomatis buat kolom created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datadiri');
    }
};
