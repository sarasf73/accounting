<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('debit');
            $table->unsignedBigInteger('credit');
            $table->foreignId('document_id')->constrained('documents','id');
            $table->foreignId('book_id')->constrained('books','id');
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
        Schema::dropIfExists('docitems');
    }
}
