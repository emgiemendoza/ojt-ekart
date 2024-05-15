<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterOrdersAmount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function(Blueprint $table)
        {
            $table->decimal('billing_discount')->default(0)->change();
            $table->decimal('billing_subtotal',14)->change();
            $table->decimal('billing_tax',14)->change();
            $table->decimal('billing_total',14)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function(Blueprint $table)
        {
            $table->integer('billing_discount')->default(0)->change();
            $table->integer('billing_subtotal')->change();
            $table->integer('billing_tax')->change();
            $table->integer('billing_total')->change();

        });
    }
}
