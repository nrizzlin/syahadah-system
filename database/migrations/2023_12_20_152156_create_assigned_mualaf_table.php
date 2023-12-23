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
        Schema::create('assigned_mualaf', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mentor_id');
            $table->unsignedBigInteger('mualaf_id');
            $table->timestamps();

            $table->foreign('mentor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('mualaf_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assigned_mualaf');
    }
};
