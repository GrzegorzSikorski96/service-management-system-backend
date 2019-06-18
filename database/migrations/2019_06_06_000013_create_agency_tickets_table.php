<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAgencyTicketsTable
 */
class CreateAgencyTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('agency_tickets', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->unsignedBigInteger("ticket_id");
            $table->foreign('ticket_id')->references('id')->on('tickets');

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
        Schema::table('agency_tickets', function (Blueprint $table): void {
            $table->dropForeign('agency_tickets_ticket_id_foreign');
            $table->dropForeign('agency_tickets_agency_id_foreign');
            $table->dropIfExists();
        });
    }
}
