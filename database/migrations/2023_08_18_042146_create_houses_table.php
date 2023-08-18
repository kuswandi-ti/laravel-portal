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
        Schema::create('houses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('owner_name');
            $table->string('street');
            $table->string('block');
            $table->string('no');
            $table->string('address_info')->nullable();
            $table->foreignUuid('area_id')->constrained('areas')->nullable();
            $table->boolean('status')->default(1)->comment('Active or Inactive Status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
