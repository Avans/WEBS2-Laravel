<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReplacePeopleWithUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function(Blueprint $table) {
            $table->dropForeign('fk_chairman');
        });
        Schema::dropIfExists('event_person');
        Schema::dropIfExists('people');

        Schema::table('events', function(Blueprint $table) {
            $table->foreign('chairman_id', 'fk_chairman')->references('id')->on('users')->onDelete('restrict');
        });

        Schema::create('event_user', function(Blueprint $table) {
            $table->integer('event_id', false, true);
            $table->integer('user_id', false, true);

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('required');
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
        });
        Schema::dropIfExists('event_user');
        Schema::table('events', function(Blueprint $table) {
            $table->foreign('chairman_id', 'fk_chairman')->references('id')->on('people')->onDelete('restrict');
        });

        Schema::create('event_person', function(Blueprint $table) {
            $table->integer('event_id', false, true);
            $table->integer('person_id', false, true);

            $table->foreign('event_id', false, true)->references('id')->on('events')->onDelete('cascade');
            $table->foreign('person_id', false, true)->references('id')->on('people')->onDelete('cascade');
            $table->boolean('required');
        });
    }
}
