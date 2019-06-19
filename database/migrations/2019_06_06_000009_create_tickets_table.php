<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateTicketsTable
 */
class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('description');
            $table->string('note');
            $table->string('message');

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');

            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');

            $table->unsignedBigInteger('device_id');
            $table->foreign('device_id')->references('id')->on('devices');

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
        Schema::table('tickets', function (Blueprint $table): void {
            $table->dropForeign('tickets_device_id_foreign');
            $table->dropForeign('tickets_status_id_foreign');
            $table->dropForeign('tickets_client_id_foreign');
            $table->dropIfExists();
        });
    }
}
