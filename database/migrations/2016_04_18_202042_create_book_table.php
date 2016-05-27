<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_category_id');
            $table->string('book_name');
            $table->text('book_description');
            $table->string('book_writter');
            $table->string('book_edition');
            $table->string('book_publisher');
            $table->integer('book_quantity');
            $table->string('book_pdf');
            $table->string('book_image');
            $table->tinyInteger('publication_status');
            $table->rememberToken();
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
        Schema::drop('book');
    }
}
