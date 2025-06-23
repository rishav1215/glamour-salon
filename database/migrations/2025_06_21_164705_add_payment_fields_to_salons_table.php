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
        Schema::table('salons', function (Blueprint $table) {
             $table->string('payment_id')->nullable()->after('is_approved');
        $table->string('order_id')->nullable()->after('payment_id');
        $table->timestamp('approved_at')->nullable()->after('order_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salons', function (Blueprint $table) {
             $table->dropColumn(['payment_id', 'order_id', 'approved_at']);
        });
    }
};
