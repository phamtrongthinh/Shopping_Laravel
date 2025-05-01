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
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // khách hàng đặt hàng
            $table->foreignId('staff_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('full_name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('address');
            $table->string('province');
            $table->string('district');
            $table->text('note')->nullable();
            $table->decimal('total_amount', 15, 2); // tổng tiền đơn hàng
            $table->enum('status', ['pending', 'processing', 'shipping', 'completed', 'cancelled'])->default('pending');
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
