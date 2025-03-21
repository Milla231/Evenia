<?php

use App\Models\Evenement;
use App\Models\Participant;
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
        Schema::create('participants_evenements', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Participant::class);
            $table->foreignIdFor(Evenement::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participant_evenements');
    }
};
