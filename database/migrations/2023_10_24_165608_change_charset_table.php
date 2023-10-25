<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::table('history_users', function (Blueprint $table) {
            DB::statement('ALTER TABLE history_users CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('history_users', function (Blueprint $table) {
            //
        });
    }
};
