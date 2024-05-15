<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                  ->onUpdate('cascade')->onDelete('set null');
            $table->string('billing_email')->nullable();
            $table->string('billing_name')->comment('Pick Up By')->nullable();
            $table->string('billing_address')->comment('Company')->nullable();
            $table->string('billing_city')->comment('Department')->nullable();
            $table->string('billing_province')->nullable();
            $table->string('billing_postalcode')->comment('Cash/Credit')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_name_on_card')->nullable();
            $table->integer('billing_discount')->comment('POS Transaction No.')->default(0);
            $table->string('billing_discount_code')->nullable();
            $table->integer('billing_subtotal');
            $table->integer('billing_tax')->comment('POS Total');
            $table->integer('billing_total')->comment('Total');
            $table->string('payment_gateway')->default('stripe');
            $table->boolean('shipped')->default(false);
            $table->string('error')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
