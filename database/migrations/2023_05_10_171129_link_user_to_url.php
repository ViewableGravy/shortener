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
        Schema::table('shorten', function (Blueprint $table) {
            // add a user column to the url table
            $table->foreignId('user_id')->nullable()->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shorten', function (Blueprint $table) {
            // drop the user column from the url table
            $table->dropColumn('user_id');
        });
    }
};
