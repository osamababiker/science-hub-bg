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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('en_name');
            $table->string('ar_name');
            $table->double("rating")->default(0);
            $table->integer("rating_count")->default(0);
            $table->integer("duration");
            $table->string("level");
            $table->string("languange");
            $table->string("difficulty");
            $table->text('en_desc')->nullable();
            $table->text('ar_desc')->nullable();

            $table->text('page_key_words')->nullable();
            $table->text('page_description')->nullable();

            $table->unsignedBigInteger('sub_of');
            $table->foreign('sub_of')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
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
        Schema::dropIfExists('lessons');
    }
};
