<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_trends', function (Blueprint $table) {
            // General Fields
            $table->enum('type', ['event', 'news', 'trend'])->default('event'); // Differentiates between events, news, and trends
            $table->string('badge')->nullable();
            $table->string('title', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->text('header')->nullable();
            $table->longText('short_des')->comment('summernote')->nullable();
            $table->longText('long_des')->comment('summernote')->nullable();
            $table->longText('story')->comment('summernote')->nullable(); // Applicable to events and trends
            $table->text('address')->nullable(); // Kept from news_trends, could be useful for events
            $table->text('location')->nullable(); // Specific to events
            $table->text('map_url')->nullable(); // Specific to events
            $table->date('start_date')->nullable(); // Specific to events
            $table->date('end_date')->nullable(); // Specific to events
            $table->date('registration_deadline')->nullable(); // Specific to events
            $table->json('tags')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('logo_image')->nullable();
            $table->string('additional_url')->nullable();
            $table->text('footer')->nullable()->comment('summernote')->nullable();
            $table->enum('status', ['active', 'inactive', 'completed'])->default('active'); // Specific to events
            $table->string('organizer')->nullable(); // Specific to events
            $table->integer('participants_count')->default(0); // Specific to events
            $table->boolean('featured')->default(false); // Specific to both events and news/trends
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_trends');
    }
};
