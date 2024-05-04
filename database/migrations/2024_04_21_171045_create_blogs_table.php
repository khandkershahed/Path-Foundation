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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
            $table->string('card_image', 100)->nullable()->comment('Image Dimension: 360 x 250');
            $table->string('badge', 11);
            $table->string('banner_image', 100)->nullable()->comment('Image Dimension: 373 x 466');
            $table->string('title', 40);
            $table->string('slug', 60)->unique();
            $table->string('summary', 255);
            $table->text('description')->comment('text editor: TinyMCE');
            $table->date('published_at');
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('comments')->default(0);
            $table->string('meta_title', 60)->nullable();
            $table->string('meta_keywords', 100)->nullable();
            $table->string('meta_description', 160)->nullable();
            $table->string('meta_image', 100)->nullable();
            $table->string('url', 255)->nullable();
            $table->boolean('status')->default(0)->comment('0 for inactive, 1 for active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
