<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->enum('mode_of_invitation', ['Friend/Family', 'Social Media', 'Flyer', 'Other'])->default('Other');
            $table->string('invited_by')->nullable();
            $table->enum('like_to_join_the_church', ['Yes', 'No', 'Maybe'])->default('Yes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->removeColumn('mode_of_invitation');
            $table->removeColumn('invited_by');
            $table->boolean('like_to_join_the_church');
        });
    }
}
