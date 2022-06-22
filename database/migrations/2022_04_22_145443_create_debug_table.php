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
        Schema::create('debugs', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('debug')->default(true);
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
        Schema::dropIfExists('debugs');
    }

    /** function to drop specific coloumn */
    public function dropIfExists($table, $column)
    {
        if (Schema::hasColumn($table, $column)) //check the column
        {
            Schema::table($table, function (Blueprint $table) use ($column) {
                $table->dropColumn($column); //drop it
            });
        }
    }
};
