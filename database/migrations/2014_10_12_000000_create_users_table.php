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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('member_id')->unique();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->string('institution')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('district')->nullable();
            $table->text('address')->nullable();
            $table->string('status',150)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
