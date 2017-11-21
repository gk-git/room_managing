<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1511253244ReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('reservations')) {
            Schema::create('reservations', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->datetime('start')->nullable();
                $table->datetime('end')->nullable();
                $table->tinyInteger('paid')->nullable()->default(0);
                $table->string('status')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
