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
        // 1. Ubah Users: Hapus is_admin, Ganti jadi Role
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin'); // Hapus kolom lama
            // Role: 'user', 'admin', 'super_admin'
            $table->string('role')->default('user')->after('email');
        });

        // 2. Buat Tabel Reports (Polymorphic)
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Pelapor
            $table->morphs('reportable'); // Bisa post_id atau comment_id
            $table->string('reason');
            $table->enum('status', ['pending', 'solved'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->boolean('is_admin')->default(false);
        });
    }
};
