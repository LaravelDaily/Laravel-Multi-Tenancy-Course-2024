<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
    }

    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
        });
    }
};
