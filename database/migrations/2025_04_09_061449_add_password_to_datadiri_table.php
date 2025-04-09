<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('datadiri', function (Blueprint $table) {
            // Tambahkan kolom password, sesuaikan posisinya bila perlu
            $table->string('password')->after('no_hp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('datadiri', function (Blueprint $table) {
            $table->dropColumn('password');
        });
    }
};
