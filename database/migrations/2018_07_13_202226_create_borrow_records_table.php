<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_records', function (Blueprint $table) {
            $table->increments('borrow_id');
            $table->bigInteger('item_id');
            $table->bigInteger('user_id');
            $table->bigInteger('borrowed');
            $table->bigInteger('returned');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('item_records');
            $table->foreign('user_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrow_records');
    }
}
