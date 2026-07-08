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
    Schema::create('alumni', function (Blueprint $table) {
        $table->id();                          // auto-increment primary key
        $table->string('name');                // alumni full name
        $table->string('email')->unique();     // email (must be unique)
        $table->string('password');            // hashed password
        $table->string('branch');              // e.g. Computer Science
        $table->string('batch');               // e.g. 2020
        $table->string('company')->nullable(); // current company
        $table->string('role')->nullable();    // current job role
        $table->string('phone')->nullable();   // phone number
        $table->text('bio')->nullable();       // short bio
        $table->string('profile_photo')->nullable(); // photo filename
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // admin approval
        $table->boolean('is_admin')->default(false); // is this user an admin?
        $table->timestamps();                  // created_at and updated_at
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};
