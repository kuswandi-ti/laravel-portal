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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->text('image')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->foreignUuid('area_id')->constrained('areas')->nullable();
            $table->string('register_token')->nullable();
            $table->boolean('status')->default(1)->comment('Active or Inactive Status');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
        Schema::table('members', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};