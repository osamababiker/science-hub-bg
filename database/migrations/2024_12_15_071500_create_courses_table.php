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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('en_name');
            $table->string('ar_name');
            $table->string('image'); 
            $table->double("rating");
            $table->integer("rating_count");
            $table->integer("lesson_count");
            $table->integer("duration");
            $table->string("level_en");
            $table->string("level_ar");
            $table->double("original_price");
            $table->double("discounted_price");
            $table->string("language_en");
            $table->string("language_ar");
            $table->string("difficulty_en");
            $table->string("difficulty_ar");
            $table->text('en_desc');
            $table->text('ar_desc');

            $table->text('page_key_words');
            $table->text('page_description');

            $table->unsignedBigInteger('sub_of');
            $table->foreign('sub_of')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')
                ->references('id')
                ->on('teachers')
                ->onDelete('cascade');

            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
