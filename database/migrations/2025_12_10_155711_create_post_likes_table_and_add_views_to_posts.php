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
        // 1. Tabel Pivot untuk Likes (Many-to-Many)
        Schema::create('post_user_likes', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Mencegah satu user like post yang sama berkali-kali
            $table->primary(['post_id', 'user_id']);
        });

        // 2. Tambah Kolom Views ke Tabel Posts
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('views_count')->default(0)->after('body');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_user_likes');

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('views_count');
        });
    }
};
