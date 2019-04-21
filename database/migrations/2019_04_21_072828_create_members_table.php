<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('church_id')->unsigned();
            $table->foreign('church_id')->references('id')->on('churches')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_number')->unique();
            $table->string('whatsapp_number')->nullable();
            $table->text('address');
            $table->string('neighbourhood')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->enum('gender', ['female', 'male', 'other']);
            $table->string('occupation')->nullable();
            $table->enum('employment_status', ['employed', 'unemployed', 'self-employed', 'NYSC', 'student', 'retired', 'other']);
            $table->date('birthday')->nullable();
            $table->date('date_joined')->nullable();
            $table->string('membership_number')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
