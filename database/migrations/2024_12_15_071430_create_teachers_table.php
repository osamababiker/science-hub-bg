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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('en_name');
            $table->string('ar_name');
            $table->string('image');
            $table->string('role_en');
            $table->string('role_ar');
            $table->double("rating"); 
            $table->integer("students")->default(0);
            $table->integer("courses")->default(0);
 
            $table->text('en_desc');
            $table->text('ar_desc');
            
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
        Schema::dropIfExists('teachers');
    }
};
