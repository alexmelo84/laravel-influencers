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
        Schema::create('influencer_campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_influencer')->constrained(table: 'influencers', indexName: 'id_influencer_relationship');
            $table->foreignId('id_campaign')->constrained(table: 'campaigns', indexName: 'id_campaign_relationship');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('influencer_campaigns');
    }
};
