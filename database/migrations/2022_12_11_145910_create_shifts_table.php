<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->index();
            $table->string('shift_type')->nullable();
            $table->string('status')->nullable();
            $table->boolean('taxable')->nullable();
            $table->unsignedInteger('hours')->nullable();
            $table->float('rate_per_hour')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->date('date')->nullable();
            $table->float('total_pay')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shifts');
    }
}
