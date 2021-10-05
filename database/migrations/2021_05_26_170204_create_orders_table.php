<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("address")->nullable();
            $table->string("status")->default('New Order');
            $table->string('discount_type')->nullable();
            $table->decimal('discount_amount')->nullable();
            $table->decimal('vat')->nullable();
            $table->string('payment_option')->nullable();
            $table->string('order_mode')->default('pos');
            $table->foreignId('customer_id')->nullable()->constrained('customers');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
