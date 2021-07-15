<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SalesDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sales_details', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->bigInteger('sale_id');
            $table->bigInteger('product_id');
            $table->decimal("heigth", 8, 3);
            $table->decimal("width", 8, 3);
            $table->integer('amount');
            
        });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('sales_details');
    }
}
