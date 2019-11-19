<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAgencyDevicesTable
 */
class CreateAgencyDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('agency_devices', function (Blueprint $table): void {
            $table->bigIncrements('id');

            $table->unsignedBigInteger("device_id");
            $table->foreign('device_id')->references('id')->on('devices');

            $table->unsignedBigInteger("agency_id");
            $table->foreign('agency_id')->references('id')->on('agencies');

            $table->unique(['device_id', 'agency_id']);

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
        Schema::table('agency_devices', function (Blueprint $table): void {
            $table->dropForeign('agency_devices_device_id_foreign');
            $table->dropForeign('agency_devices_agency_id_foreign');
            $table->dropIfExists();
        });
    }
}
