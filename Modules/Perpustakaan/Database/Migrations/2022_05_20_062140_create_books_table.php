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
            $table->id();
            $table->string('book_code')->unique();
            $table->string('name');
            $table->longText('description');
            $table->string('thumbnail');
            $table->foreignId('category_id');
            $table->foreignId('author_id');
            $table->foreignId('publisher_id');
            $table->year('publication_year');
            $table->string('isbn', 50);
            $table->integer('stock');
            $table->boolean('is_available')->default('0');
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
