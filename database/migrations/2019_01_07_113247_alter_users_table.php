<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->after('name');
            $table->string('gender')->after('email');
            $table->date('date')->after('last_name');
            $table->string('phone_number')->nullable()->after('email');
            $table->string('place')->after('phone_number');
            $table->string('postal_code')->after('place');
            $table->string('house_number')->after('postal_code');
            
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
            $table->dropColumn('last_name');
            $table->dropColumn('gender');
            $table->dropColumn('date');
            $table->dropColumn('phone_number');
            $table->dropColumn('place');
            $table->dropColumn('postal_code');
            $table->dropColumn('house_number');
        });
    }
}
