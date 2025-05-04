<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryImportItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_import_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_import_id');
            $table->unsignedBigInteger('product_detail_id'); // Biến thể sản phẩm
            $table->integer('quantity')->default(0);
            $table->decimal('unit_price', 15, 2)->default(0); // Giá nhập
            $table->decimal('total_price', 15, 2)->default(0); // Tổng tiền = quantity * unit_price
            $table->timestamps();

            $table->foreign('inventory_import_id')->references('id')->on('inventory_imports')->onDelete('cascade');
            $table->foreign('product_detail_id')->references('id')->on('product_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_import_items');
    }
}
