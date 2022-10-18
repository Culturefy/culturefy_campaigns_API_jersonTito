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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('campaigns_id');
            $table->string('campaigns_goal')->nullable();
            $table->string('audience_targeting')->nullable();
            $table->string('gender')->nullable();
            $table->string('gender_group')->nullable();
            $table->date('campaigns_start_date')->nullable();
            $table->date('campaigns_end_date')->nullable();
            $table->string('campaigns_status')->nullable();
            $table->string('campaigns_title')->nullable();
            $table->string('campaigns_description')->nullable();
            $table->string('campaigns_location')->nullable();
            $table->string('campaigns_contract')->nullable();
            $table->string('campaigns_level')->nullable();
            $table->string('campaigns_skill')->nullable();
            $table->string('natvie_title')->nullable();
            $table->string('natvie_description')->nullable();
            $table->string('natvie_url')->nullable();
            $table->string('natvie_image')->nullable();
            $table->string('display_title')->nullable();
            $table->string('display_description')->nullable();
            $table->string('display_url')->nullable();
            $table->string('display_image')->nullable();
            $table->string('video_title')->nullable();
            $table->string('video_description')->nullable();
            $table->string('video_url')->nullable();
            $table->string('video_image')->nullable();
            $table->string('audio_title')->nullable();
            $table->string('audio_description')->nullable();
            $table->string('audio_url')->nullable();
            $table->string('audio_image')->nullable();
            $table->tinyInteger('campaigns_archive')->nullable();
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
        //
    }
};
