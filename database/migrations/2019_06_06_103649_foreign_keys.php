<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('tickets', function (Blueprint $table): void {
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('device_id')->references('id')->on('devices');
        });

        Schema::table('notes', function (Blueprint $table): void {
            $table->foreign('ticket_id')->references('id')->on('tickets');
        });

        Schema::table('agencies', function (Blueprint $table): void {
            $table->foreign('service_id')->references('id')->on('services');
        });

        Schema::table('services', function (Blueprint $table): void {
            $table->foreign('owner_id')->references('id')->on('users');
        });

        Schema::table('agency_employees', function (Blueprint $table): void {
            $table->foreign('agency_id')->references('id')->on('agencies');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('agency_role_id')->references('id')->on('agency_roles');
        });

        Schema::table('agency_devices', function (Blueprint $table): void {
            $table->foreign('agency_id')->references('id')->on('agencies');

            $table->foreign('device_id')->references('id')->on('devices');
        });

        Schema::table('agency_clients', function (Blueprint $table): void {
            $table->foreign('agency_id')->references('id')->on('agencies');

            $table->foreign('client_id')->references('id')->on('clients');
        });

        Schema::table('agency_tickets', function (Blueprint $table): void {
            $table->foreign('agency_id')->references('id')->on('agencies');

            $table->foreign('ticket_id')->references('id')->on('tickets');
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
        });

        Schema::table('agency_clients', function (Blueprint $table): void {
            $table->dropForeign('agency_clients_client_id_foreign');
            $table->dropForeign('agency_clients_agency_id_foreign');
        });

        Schema::table('agency_devices', function (Blueprint $table): void {
            $table->dropForeign('agency_devices_device_id_foreign');
            $table->dropForeign('agency_devices_agency_id_foreign');
        });

        Schema::table('agency_employees', function (Blueprint $table): void {
            $table->dropForeign('agency_employees_agency_role_id_foreign');
            $table->dropForeign('agency_employees_user_id_foreign');
            $table->dropForeign('agency_employees_agency_id_foreign');
        });

        Schema::table('services', function (Blueprint $table): void {
            $table->dropForeign('services_owner_id_foreign');
        });

        Schema::table('agencies', function (Blueprint $table): void {
            $table->dropForeign('agencies_service_id_foreign');
        });

        Schema::table('notes', function (Blueprint $table): void {
            $table->dropForeign('notes_ticket_id_foreign');
        });

        Schema::table('tickets', function (Blueprint $table): void {
            $table->dropForeign('tickets_device_id_foreign');
            $table->dropForeign('tickets_status_id_foreign');
            $table->dropForeign('tickets_client_id_foreign');
        });
    }
}
