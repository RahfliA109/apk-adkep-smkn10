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
        Schema::table('riwayat_menikah', function (Blueprint $table) {
            // Tambahkan kolom nuptk_nip
            $table->string('nuptk_nip', 50)->after('id');
            
            // Tambahkan foreign key constraint
            $table->foreign('nuptk_nip')
                  ->references('nuptk_nip')
                  ->on('user')
                  ->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('riwayat_menikah', function (Blueprint $table) {
            $table->dropForeign(['nuptk_nip']);
            $table->dropColumn('nuptk_nip');
        });
    }
};
