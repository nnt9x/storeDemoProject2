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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->integer('total_price');
            // Cho phép người khác nhận hộ
            $table->string('receiver_name', 30);
            $table->string('receiver_phone', 12);
            $table->string('receiver_address', 255);
            // Trang thai hoa don: -1 huỷ, 0: chưa duyệt, 1 đã duyệt, 2 đang giao , 3 thành công
            $table->integer('status')->default(0);
            $table->string('note', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
