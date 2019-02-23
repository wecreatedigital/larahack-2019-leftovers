<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname')->nullable()->after('name');
            $table->string('lastname')->nullable()->after('firstname');
            $table->string('username')->nullable()->after('lastname');
            $table->string('nickname')->nullable()->after('username');
            $table->string('gender')->nullable()->after('nickname');
            $table->dateTime('dob')->nullable()->after('gender');

            $table->string('home_number', 12)->nullable()->after('password');
            $table->string('mobile_number', 12)->nullable()->after('home_number');
            $table->string('work_number', 12)->nullable()->after('mobile_number');

            $table->string('address')->nullable()->after('work_number');
            $table->text('bio')->nullable()->after('address');
            $table->string('avatar')->nullable()->after('bio');
            $table->string('website')->nullable()->after('avatar');
            $table->string('facebook')->nullable()->after('website');
            $table->string('instagram')->nullable()->after('facebook');
            $table->string('twitter')->nullable()->after('instagram');
            $table->string('linkedin')->nullable()->after('twitter');
            $table->string('company')->nullable()->after('linkedin');

            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('username');
            $table->dropColumn('nickname');
            $table->dropColumn('gender');
            $table->dropColumn('dob');

            $table->dropColumn('home_number');
            $table->dropColumn('mobile_number');
            $table->dropColumn('work_number');

            $table->dropColumn('address');
            $table->dropColumn('bio');
            $table->dropColumn('avatar');
            $table->dropColumn('website');
            $table->dropColumn('facebook');
            $table->dropColumn('instagram');
            $table->dropColumn('twitter');
            $table->dropColumn('linkedin');
            $table->dropColumn('company');

            $table->string('name')->after('id');
        });
    }
}
