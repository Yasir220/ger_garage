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
			$table->string('name');
			$table->integer('category_id');
			$table->integer('Subcategory_id');
			$table->integer('product_id');
			$table->integer('vehicle_id');
			$table->integer('price');
			$table->integer('quantity');
			$table->string('description');
			$table->string('image');
			$table->string('worker_message');
			$table->string('manager_message');
			$table->string('worker_status');
			$table->string('manager_status');
			$table->integer('labour_cost');
			$table->string('bill_date');
			$table->string('bill_status');
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
