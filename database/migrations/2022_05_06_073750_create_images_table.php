<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * uploader can be guest -> nullable
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Fehler: Name ist null');
            $table->string('path')->default('Fehler: Pfad ist null');
            $table->integer('person_id')->unsigned()->nullable();
            $table->foreign('person_id')->references('id')->on('people');
            $table->timestamp('upload_time', 0)->nullable();
            $table->timestamp('update_time', 0)->nullable();
            $table->softDeletes('remove_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('images', function (Blueprint $table) {
            if (Schema::hasColumns('images', ['name', 'path', 'person_id'])) {
                $table->dropColumn('name');
                $table->dropColumn('path');
                $table->dropColumn('person_id');
            }
            $table->dropSoftDeletes();
        }));
        Schema::dropIfExists('images');
    }
};
