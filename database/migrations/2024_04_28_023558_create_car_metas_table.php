<?php

use App\Models\Car;
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
        Schema::create('car_metas', function (Blueprint $table) {
            $table->id();
            $table->string('engine');
            $table->string('fuel_type');
            $table->string('transmission_type');
            $table->string('mileage');
            $table->foreignIdFor(Car::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_metas');
    }
};
