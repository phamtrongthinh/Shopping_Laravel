<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  Schema::create('colors', function (Blueprint $table) {
        $table->id();  // Cột tự động tăng cho ID
        $table->string('name');  // Cột 'name' kiểu chuỗi
        $table->string('code');  // Cột 'code' kiểu chuỗi
        $table->timestamps();  // Tạo cột 'created_at' và 'updated_at'          
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colors');
    }
}
