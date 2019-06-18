<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAgenciesTable
 */
class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('agencies', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->string('phone_number');
            $table->timestamps();

            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('agencies', function (Blueprint $table): void {
            $table->dropForeign('agencies_service_id_foreign');
            $table->dropIfExists();
        });
    }
}
