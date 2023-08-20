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
        Schema::create('areas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('slug');
            $table->bigInteger('residence_id')->unsigned()->nullable();
            $table->foreign('residence_id')->references('id')->on('residences')->onUpdate('cascade')->onDelete('restrict');
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('province_code')->nullable();
            $table->string('city_code')->nullable();
            $table->string('district_code')->nullable();
            $table->string('village_code')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('full_address')->nullable();
            $table->bigInteger('package_id')->unsigned()->nullable();
            $table->foreign('package_id')->references('id')->on('packages')->onUpdate('cascade')->onDelete('restrict');
            $table->string('package_type')->comment('Monthly, Yearly')->nullable();
            $table->string('membership_type')->comment('Trial, Member')->nullable();
            $table->date('register_date')->nullable();
            $table->date('valid_to_date')->nullable()->comment('End Valid Date Trial');
            $table->string('cost')->default(0);
            $table->string('staff_limit')->default(0);
            $table->string('user_limit')->default(0);
            $table->string('wallet_amount_limit')->default(0);
            $table->boolean('live_chat')->default(0);
            $table->boolean('support_ticket')->default(0);
            $table->boolean('online_payment')->default(0);
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
        Schema::dropIfExists('areas');
        Schema::table('areas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
