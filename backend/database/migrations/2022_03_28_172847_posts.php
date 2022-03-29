<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    private string $tableName = 'posts';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('author', 155)->nullable();
            $table->string('title', 255);
            $table->text('description');
            $table->string('url', 255)->unique();
            $table->string('urlToImage')->nullable();
            $table->mediumText('content');
            $table->string('tag', 155);
            $table->unsignedBigInteger('source_id');

            $table->foreign('source_id')
                ->references('id')
                ->on('sources')
                ->onDelete('cascade');
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
        Schema::drop($this->tableName);
    }
}
