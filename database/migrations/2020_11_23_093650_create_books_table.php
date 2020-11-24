<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
             $table->bigIncrements('id');
              $table->string('name');
            $table->string('author',100);
            $table->string('code',50);
            $table->boolean('status');
             $table->bigInteger('bor_id')->unsigned();
            $table->foreign('bor_id')  ->references('id')->on('borrowers')->onDelete('cascade');
             $table->bigInteger('bookcat_id')->unsigned();
            $table->foreign('bookcat_id')  ->references('id')->on('book_categories')->onDelete('cascade');
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
        Schema::dropIfExists('books');
    }
}
