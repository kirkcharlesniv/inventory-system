<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stock_code');
            $table->string('name');
            $table->mediumText('description');
            $table->bigInteger('initial_stocks');
            $table->bigInteger('remaining_stocks');
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
        Schema::dropIfExists('item_records');
    }
}
