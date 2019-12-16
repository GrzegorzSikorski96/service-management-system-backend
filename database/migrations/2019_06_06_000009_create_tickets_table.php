<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Sms\Models\TicketStatus;

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
            $table->string('additional_information');
            $table->string('message')->nullable();
            $table->string('token')->unique();

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->unsignedBigInteger('ticket_status_id')->default(TicketStatus::PENDING);
            $table->foreign('ticket_status_id')->references('id')->on('ticket_statuses')->onDelete('cascade');

            $table->unsignedBigInteger('device_id');
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
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
            $table->dropForeign('tickets_ticket_status_id_foreign');
            $table->dropForeign('tickets_client_id_foreign');
            $table->dropIfExists();
        });
    }
}
