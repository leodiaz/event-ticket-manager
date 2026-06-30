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
        Schema::create('presale_orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('recital_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('order_number')
                ->nullable()
                ->unique();

            $table->string('customer_name');

            $table->string('customer_email');

            $table->integer('ticket_quantity');

            $table->decimal('total_amount', 10, 2);

            $table->string('qr_code')
                ->nullable()
                ->unique();

            $table->boolean('is_used')
                ->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presale_orders');
    }
};
