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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->enum('gender', ['man', 'woman'])->nullable();
            $table->enum('marital_status', ['single', 'married', 'divorced'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('profession')->nullable();
            $table->string('workplace')->nullable();
            $table->enum('religion', ['islam', 'katolik', 'protestan', 'hindu', 'budha', 'konghucu', 'other'])->nullable();
            $table->text('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('house_street_name')->nullable();
            $table->string('house_block')->nullable();
            $table->string('house_number')->nullable();
            $table->string('house_address_others')->nullable();
            $table->enum('house_ownership', ['owner', 'rent', 'other'])->nullable();
            $table->enum('house_stay', ['permanent', 'temporary', 'other'])->nullable();
            $table->string('house_note')->nullable();
            $table->string('family_card_no')->nullable();
            $table->string('id_card_no')->nullable();
            $table->foreignUuid('area_id')->constrained('areas')->nullable();
            $table->foreignUuid('house_id')->constrained('houses')->nullable();
            $table->string('register_token')->nullable();
            $table->boolean('flag_dues')->default(1)->comment('1 = Paid, 0 = Non Paid Dues');
            $table->boolean('status')->default(1)->comment('1 = Active, 0 = Inactive Status');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
