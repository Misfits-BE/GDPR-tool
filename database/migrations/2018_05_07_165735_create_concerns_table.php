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
            $table->boolean('is_open');
            $table->timestamps();
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
