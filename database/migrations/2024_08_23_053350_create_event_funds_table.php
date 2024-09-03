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
        Schema::create('event_funds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->foreignId('content_id')->constrained('news_trends')->onDelete('cascade');
            $table->string('badge')->nullable();
            $table->string('title', 250)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('category')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->double('collected_amount')->nullable();
            $table->double('target_amount')->nullable();
            $table->double('total_donors')->nullable();
            $table->double('total_expense')->nullable();
            $table->string('donation_type')->nullable();
            $table->longText('expense_details')->nullable();
            $table->longText('donor_details')->nullable();
            $table->integer('donors_count')->default(0);
            $table->string('currency', 10)->default('USD');
            $table->enum('funding_status', ['ongoing', 'completed'])->default('ongoing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_funds');
    }
};
