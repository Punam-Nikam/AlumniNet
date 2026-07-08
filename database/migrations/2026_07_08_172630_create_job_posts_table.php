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
    Schema::create('job_posts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('alumni_id')->constrained('alumni')->onDelete('cascade'); // who posted
        $table->string('title');               // job title
        $table->string('company');             // company name
        $table->string('location');            // job location
        $table->text('description');           // job description
        $table->string('apply_link')->nullable(); // external apply link
        $table->enum('type', ['full-time', 'part-time', 'internship'])->default('full-time');
        $table->boolean('is_referral')->default(true); // referral available?
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
