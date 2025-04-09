<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->string('nama')->nullable();
            $table->string('nuptk_nip')->unique()->nullable();
            $table->string('no_hp')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn(['nama', 'nuptk_nip', 'no_hp']);
        });
    }
};
