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
        Schema::create('fares', function (Blueprint $table) {
            $table->id();
            $table->string('origin');
            $table->string('destination');
            $table->decimal('baseFare', 8, 2);
            $table->decimal('distance', 8, 2);
            $table->decimal('discount', 8, 2)->nullable();
            $table->time('time');
            $table->decimal('final_fare', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fares');
    }
};
