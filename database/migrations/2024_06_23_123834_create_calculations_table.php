<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('calculations', function (Blueprint $table) {
            $table->id();
            $table->float('first_number');
            $table->string('second_number');
            $table->string('operator');
            $table->string('result');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calculations');
    }
};
