<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAgencyClientsTable
 */
class CreateAgencyClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('agency_clients', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->unsignedBigInteger("client_id");
            $table->foreign('client_id')->references('id')->on('clients');

            $table->unsignedBigInteger("agency_id");
            $table->foreign('agency_id')->references('id')->on('agencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('agency_clients', function (Blueprint $table): void {
            $table->dropForeign('agency_clients_client_id_foreign');
            $table->dropForeign('agency_clients_agency_id_foreign');
            $table->dropIfExists();
        });
    }
}
