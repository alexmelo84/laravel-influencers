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
        Schema::create('influencers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained(table: 'users', indexName: 'id_user');
            $table->string('name')->nullable(false);
            $table->string('instagram_user')->unique()->nullable(false)->unique();
            $table->integer('followers')->nullable(false)->unsigned();
            $table->string('category')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('influencers');
    }
};
