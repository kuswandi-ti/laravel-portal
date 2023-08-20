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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('cost_per_month', 10, 2);
            $table->decimal('cost_per_year', 10, 2);
            $table->string('staff_limit_per_month');
            $table->string('user_limit_per_month');
            $table->string('wallet_amount_limit_per_month');
            $table->boolean('live_chat_per_month')->default(0);
            $table->boolean('support_ticket_per_month')->default(0);
            $table->boolean('online_payment_per_month')->default(0);
            $table->string('staff_limit_per_year');
            $table->string('user_limit_per_year');
            $table->string('wallet_amount_limit_per_year');
            $table->boolean('live_chat_per_year')->default(0);
            $table->boolean('support_ticket_per_year')->default(0);
            $table->boolean('online_payment_per_year')->default(0);
            $table->boolean('status')->default(1)->comment('Active or Inactive Status');
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
        Schema::dropIfExists('packages');
        Schema::table('packages', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
