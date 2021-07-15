<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;
use PhpParser\Node\NullableType;

use function PHPUnit\Framework\isNull;

class UpdateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('products', function (Blueprint $table) {
            $table->bigInteger("papel_id");
            $table->decimal('price_front_men', 10, 2);
            $table->decimal('price_both_sides_men', 10, 2);
            $table->decimal('price_front_may', 10, 2);
            $table->decimal('price_both_sides_may', 10, 2);
            $table->integer('pieces_may');
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn("papel_id");
            $table->dropColumn('price_front_men', 10, 2);
            $table->dropColumn('price_both_sides_men', 10, 2);
            $table->dropColumn('price_front_may', 10, 2);
            $table->dropColumn('price_both_sides_may', 10, 2);
            $table->dropColumn('pieces_may', 10);   
        });       
    }
}
