<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign('bookings_product_id_foreign');
            $table->dropColumn(['product_id']);
            $table->double('total')->after('is_pay')->default(0);
            $table->dropColumn('status');
        });
        Schema::table('bookings', function (Blueprint $table) {
            $table->enum('status',['acc','pending','cancel'])->after('catatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->dropColumn(['total']);
        });
    }
}
