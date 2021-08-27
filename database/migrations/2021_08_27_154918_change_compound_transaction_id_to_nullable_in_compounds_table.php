<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCompoundTransactionIdToNullableInCompoundsTable extends Migration
{
        /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
    Schema::table('compounds', function (Blueprint $table) {
        $table->foreignId('compound_transaction_id')->nullable()->change();
    });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
    Schema::table('nullable_in_compounds', function (Blueprint $table) {
        //
    });
        }
}
