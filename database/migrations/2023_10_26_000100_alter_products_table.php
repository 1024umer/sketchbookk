<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->bigInteger('user_id')->default(0);
            $table->string('category_id');
        });
    }
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('category_id');
        });
    }
}
