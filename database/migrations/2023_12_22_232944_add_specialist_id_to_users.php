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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('specialist_id')->nullable();
            $table->foreign('specialist_id')->references('id')->on('specialists');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['specialist_id']);
            
            // Drop the specialist_id column
            $table->dropColumn('specialist_id');
        });
    }
};
