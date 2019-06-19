<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateNotesTable
 */
class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('content');

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');

            $table->unsignedBigInteger('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('tickets');

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
        Schema::table('notes', function (Blueprint $table): void {
            $table->dropForeign('notes_ticket_id_foreign');
            $table->dropForeign('notes_created_by_foreign');
            $table->dropIfExists();
        });
    }
}
