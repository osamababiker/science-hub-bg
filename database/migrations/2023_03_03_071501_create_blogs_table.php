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
            $table->string('slug')->unique();
            $table->string('en_title');
            $table->string('ar_title');
            $table->string('image');
            $table->text('en_content');
            $table->text('ar_content');

            $table->text('page_key_words');
            $table->text('page_description');

            $table->unsignedBigInteger('sub_of');
            $table->foreign('sub_of')
                ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('blogs');
    }
};
