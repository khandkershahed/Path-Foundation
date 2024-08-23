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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('badge')->nullable();
            $table->string('title', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->text('header')->nullable();
            $table->longText('short_des')->comment('summernote')->nullable();
            $table->longText('long_des')->comment('summernote')->nullable();
            $table->longText('story')->comment('summernote')->nullable();
            $table->text('location')->nullable();
            $table->text('map_url')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->json('tags')->nullable();
            $table->string('logo')->nullable();
            $table->string('image')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('additional_url')->nullable();
            $table->text('footer')->nullable()->comment('summernote')->nullable();
            $table->enum('status', ['active', 'inactive', 'completed'])->default('active');
            $table->string('organizer')->nullable();
            $table->date('registration_deadline')->nullable();
            $table->integer('participants_count')->default(0);
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
