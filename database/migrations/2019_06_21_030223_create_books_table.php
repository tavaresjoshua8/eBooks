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
            //Uniques
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned();
            $table->double('folio', 8, 4)->unique();

            //Book details
            $table->string('name', 128);
            $table->string('slug', 128)->unique();
            $table->string('author', 128);
            $table->string('translation', 128);
            $table->string('editorial', 128);
            $table->string('issue', 20);
            $table->string('country', 128);
            $table->year('year')->nullable();
            $table->string('pages', 128);
            $table->text('review');

            //Files
            $table->string('image', 300);
            $table->string('pdf', 300);

            $table->timestamps();

            //Relations
            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');
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
