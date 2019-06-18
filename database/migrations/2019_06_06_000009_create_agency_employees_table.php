<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAgencyEmployeesTable
 */
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

            $table->unsignedBigInteger('agency_id');
            $table->foreign('agency_id')->references('id')->on('agencies');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('agency_role_id');
            $table->foreign('agency_role_id')->references('id')->on('agency_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('agency_employees', function (Blueprint $table): void {
            $table->dropForeign('agency_employees_agency_role_id_foreign');
            $table->dropForeign('agency_employees_user_id_foreign');
            $table->dropForeign('agency_employees_agency_id_foreign');
            $table->dropIfExists();
        });
    }
}
