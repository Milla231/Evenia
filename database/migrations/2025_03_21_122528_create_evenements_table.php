<?php

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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->date('image')->nullable();
            $table->integer('max_participants');
            $table->string('type')->nullable(); // Nouvelle colonn
            $table->enum('status', ['actif', 'expiré'])->default('actif');
            // $table->unsignedBigInteger('created_by');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
