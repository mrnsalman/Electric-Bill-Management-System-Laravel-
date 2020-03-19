<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('Shop_id');
            $table->tinyInteger('shop_floor');
            $table->string('month');
            $table->Integer('year');
            $table->string('bill_id');
            $table->string('previous_unit');
            $table->string('current_unit');
            $table->string('used_unit');
            $table->integer('unit_rate');
            $table->integer('previous_due');
            $table->integer('additional_fee');
            $table->integer('exclude_fee');
            $table->integer('exclude_due');
            $table->integer('total_amount');
            $table->integer('after_date');
            $table->integer('paid_amount');
            $table->integer('due_amount');
            $table->string('payment_status');
            $table->string('last-date');
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
        Schema::dropIfExists('bills');
    }
}
