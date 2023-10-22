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
        Schema::create('web_skills', function (Blueprint $table) {
            $table->id();
            $table->string("skill_name");
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('created_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('web_skills');
    }
};
