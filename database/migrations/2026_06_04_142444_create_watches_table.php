<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * MIGRATION UNTUK RELASI PENGAWASAN SUPERVISOR KE DIVISI LAIN (LEVEL USER 3)
     */
    public function up(): void
    {
        Schema::create('watches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'watches_user_id'
            );
            $table->foreignId('division_id')->constrained(
                table: 'divisions',
                indexName: 'divisions_watch_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watches');
    }
};
