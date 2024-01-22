<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('veterinary_clinics', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('municipality_id');
            $table->foreign('municipality_id')->references('id')->on('municipalities')->onUpdate('cascade')->onDelete('cascade');

            $table->enum('sector', ['government', 'private']);
            $table->string('clinic_name', 50);
            $table->integer('year_established');
            $table->integer('year_closed')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('veterinary_clinics');
    }
};