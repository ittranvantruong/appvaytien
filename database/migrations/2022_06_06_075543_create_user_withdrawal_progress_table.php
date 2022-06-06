<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWithdrawalProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_withdrawal_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_loan_amount_id');
            $table->double('amount');
            $table->boolean('status')->default(0);
            $table->text('note')->nullable();
            $table->timestamps();
            $table->foreign('user_loan_amount_id')->references('id')->on('user_loan_amount')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_withdrawal_progress');
    }
}
