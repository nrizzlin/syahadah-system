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
        Schema::create('evaluated_mualaf', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();;
            $table->string('performance')->nullable();;
            $table->string('note')->nullable();;
            $table->string('result_status')->default('good')->nullable();;
            $table->unsignedBigInteger('assigned_id')->nullable();;
            $table->timestamps();

            $table->foreign('assigned_id')->references('id')->on('assigned_mualaf')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluated_mualaf');
    }
};
