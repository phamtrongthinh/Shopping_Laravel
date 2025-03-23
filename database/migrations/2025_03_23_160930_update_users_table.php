<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 15)->nullable(); // Ví dụ: sửa cột phone cho phép null
            $table->string('address', 255)->nullable(); // Thêm cột address
            $table->enum('role', ['chu_cua_hang', 'nhan_vien_ban_hang', 'nhan_vien_kho', 'khach_hang'])->default('khach_hang'); // Cập nhật ENUM
            $table->string('status', 20)->default('active'); // Trạng thái tài khoản
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            
            
        });
    }
}
