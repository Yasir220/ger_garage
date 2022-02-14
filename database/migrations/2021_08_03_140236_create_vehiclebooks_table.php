<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclebooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiclebooks', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('name');
			$table->integer('phone');
			$table->string('vehicle_type');
			$table->string('vehicle_name');
			$table->string('vehicle_engine');
			$table->string('vehicle_made');
			$table->string('vehicle_licence');
			$table->string('vehicle_service_category');
			$table->string('booking_date');
			$table->string('vehicle_issue'); 
			$table->string('status');
			$table->integer('sequence');
			$table->integer('user_id');
			$table->softDeletes();
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
        Schema::dropIfExists('vehiclebooks');
    }
}
