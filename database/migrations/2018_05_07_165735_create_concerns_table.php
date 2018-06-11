<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcernsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @todo Implement foreign keys
     * @return void
     */
    public function up(): void
    {
        Schema::create('concerns', function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('domain_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->integer('assignee_id')->nullable()->unsigned();
            $table->boolean('is_open');
            $table->string('title'); 
            $table->text('concern');
            $table->timestamps();

            //! Registration from the foreign keys 
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
            $table->foreign('assignee_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('concerns');
    }
}
