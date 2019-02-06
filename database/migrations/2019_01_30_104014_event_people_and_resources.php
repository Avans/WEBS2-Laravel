<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventPeopleAndResources extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function(Blueprint $table) {
            $table->integer('chairman_id', false, true)->nullable(true);
            $table->foreign('chairman_id', 'fk_chairman')->references('id')->on('people')->onDelete('restrict');
        });

        Schema::create('event_person', function(Blueprint $table) {
            $table->integer('event_id', false, true);
            $table->integer('person_id', false, true);

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
            $table->boolean('required');
        });
        Schema::create('event_resource', function(Blueprint $table) {
            $table->integer('event_id', false, true);
            $table->integer('resource_id', false, true);

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('resource_id')->references('id')->on('resources')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function(Blueprint $table) {
            $table->dropForeign('fk_chairman');
            $table->dropColumn('chairman_id');
        });
        Schema::dropIfExists('event_person');
        Schema::dropIfExists('event_resource');
    }
}
