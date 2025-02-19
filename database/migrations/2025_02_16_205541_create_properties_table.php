<?php

use App\Enums\PropertyStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price');
            $table->string('location');
            $table->enum('status' , PropertyStatus::values()); // validation Using Enums
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
