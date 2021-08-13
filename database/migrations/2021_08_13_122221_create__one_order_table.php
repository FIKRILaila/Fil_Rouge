<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOneOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oneOrder', function (Blueprint $table) {
            $table->id();
            $table->integer('pourCombien');
            $table->unsignedBigInteger('cmd_id');
            $table->foreign('cmd_id')->references('id')->on('orders')->ondelete('cascade');
            $table->unsignedBigInteger('plat_id');
            $table->foreign('plat_id')->references('id')->on('plats')->ondelete('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oneOrder', function (Blueprint $table) {
            //
        });
    }
}
