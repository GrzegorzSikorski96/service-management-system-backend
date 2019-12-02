<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateServicesTable
 */
class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->string('address');
            $table->string('NIP');
            $table->string('phone_number');
            $table->string('email');

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
        Schema::table('services', function (Blueprint $table): void {
            $table->dropIfExists();
        });
    }
}
