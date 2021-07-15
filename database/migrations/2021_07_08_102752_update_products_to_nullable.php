<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsToNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->bigInteger("papel_id")->nullable()->change();
            $table->decimal('price_front_men', 10, 2)->nullable()->change();
            $table->decimal('price_both_sides_men', 10, 2)->nullable()->change();
            $table->decimal('price_front_may', 10, 2)->nullable()->change();
            $table->decimal('price_both_sides_may', 10, 2)->nullable()->change();
            $table->integer('pieces_may')->nullable()->change();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->bigInteger("papel_id");
            $table->decimal('price_front_men', 10, 2);
            $table->decimal('price_both_sides_men', 10, 2);
            $table->decimal('price_front_may', 10, 2);
            $table->decimal('price_both_sides_may', 10, 2);
            $table->integer('pieces_may');
        });
    }
}
