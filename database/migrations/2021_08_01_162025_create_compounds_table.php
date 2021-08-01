<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compounds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lecturer_id');
            $table->foreignId('student_id');
            $table->double('comp_value');
            $table->string('merit_deduction');
            $table->string('comp_reason');
            $table->dateTime('submission_date');
            $table->boolean('payment_status');
            $table->foreignId('compound_transaction_id');
            $table->string('invoice_file_url');
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
        Schema::dropIfExists('compounds');
    }
}
