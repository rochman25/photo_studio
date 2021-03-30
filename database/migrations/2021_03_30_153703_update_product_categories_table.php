<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_categories', function (Blueprint $table) {
            $table->enum('style',['parent','sub','single'])->after('nama');
            $table->unsignedBigInteger('parent_id')->after('style')->nullable(true);
            $table->text('thumbnail')->nullable(true)->after('deskripsi'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_categories', function (Blueprint $table) {
            $table->dropColumn(['style','parent_id','deskripsi','thumbnail']);
        });
    }
}
