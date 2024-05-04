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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name', 50)->nullable();
            $table->string('site_logo', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->text('address')->nullable();
            $table->boolean('maintenance_mode')->default(false);
            $table->string('seo_keywords', 255)->nullable();
            $table->text('seo_description')->nullable();
            $table->string('social_facebook', 255)->nullable();
            $table->string('social_twitter', 255)->nullable();
            $table->string('social_instagram', 255)->nullable();
            $table->string('social_linkedin', 255)->nullable();
            $table->string('social_youtube', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};


//$table->string('currency', 10)->default('USD');
//$table->string('timezone', 50)->default('UTC');
//$table->integer('pagination_count')->default(15);
//$table->string('analytics_code', 255)->nullable();
//$table->string('google_maps_key', 255)->nullable();
//$table->string('recaptcha_site_key', 255)->nullable();
//$table->string('recaptcha_secret_key', 255)->nullable();
