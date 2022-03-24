<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_task', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->boolean('realizada')->default(0);
            $table->integer('task_id')->unsigned();
            $table->foreign('task_id')->references(columns: 'id')->on('task')->onDelete('cascade');
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
        Schema::dropIfExists('item_task');
    }
};
