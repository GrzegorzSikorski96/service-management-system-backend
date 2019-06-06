<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencyEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('agency_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('agency_role_id')->unsigned();
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
        Schema::dropIfExists('agency_employees');
    }
}
