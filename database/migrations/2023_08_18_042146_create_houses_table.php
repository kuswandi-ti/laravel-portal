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
            $table->boolean('status')->default(1)->comment('1 = Active, 0 = Inactive');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('restored_at')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->string('restored_by')->nullable();
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
