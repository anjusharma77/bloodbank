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
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('image')->nullable();
            $table->string('blood_group')->nullable();
            $table->enum('user_type', ['receiver', 'hospital'])->default('receiver');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('state');
            $table->dropColumn('image');
            $table->dropColumn('blood_group');
            $table->dropColumn('user_type');
        });
    }
};
