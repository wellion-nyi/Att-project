<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BookBorrowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_borrower', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status', true);
             $table->bigInteger('book_id')->unsigned();
           $table->foreign('book_id')  ->references('id')->on('books')->onDelete('cascade');
            $table->bigInteger('borrower_id')->unsigned();
           $table->foreign('borrower_id')  ->references('id')->on('borrowers')->onDelete('cascade');
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
        Schema::dropIfExists('book_borrower');
    }
}
