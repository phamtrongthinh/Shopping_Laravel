<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('color');
            $table->string('size');
            $table->integer('quantity');
            $table->string('image')->nullable(); // Lưu đường dẫn ảnh           
            // Khóa ngoại liên kết với bảng products
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('product_details');
    }
}
