<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // Kolom ini merujuk ke tabel comments itu sendiri (self-referencing)
            $table->foreignId('parent_id')
                ->nullable() // Boleh kosong (untuk komentar utama)
                ->constrained('comments')
                ->onDelete('cascade'); // Jika komentar induk dihapus, balasan juga hilang
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropColumn('parent_id');
        });
    }
};
