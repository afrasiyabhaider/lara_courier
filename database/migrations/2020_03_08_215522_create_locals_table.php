<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locals', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_cnic');
            $table->string('tracking_id');
            $table->integer('shipping_charged');
            $table->float('parcel_weight');
            $table->string('shipping_address');
            $table->string('shipped_on');
            $table->tinyInteger('deliver_in_days')->comment('Shipped in how many days');
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
        Schema::dropIfExists('locals');
    }
}