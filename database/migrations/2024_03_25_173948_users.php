<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('username', 20)->unique();
            $table->string('password');
            $table->integer('number_phone');
            $table->string('name');
            $table->string('first_surname');
            $table->string('second_surname');
            $table->integer('offers');
            $table->integer('type');
            $table->string('email')->unique();
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
