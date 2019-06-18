<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgencyEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('agency_employees', function (Blueprint $table): void {
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
    public function down(): void
    {
        Schema::dropIfExists('agency_employees');
    }
}
