<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model
{
    use HasFactory,UploadTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'campaigns_goal', 'audience_targeting', 'gender', 'gender_group', 'campaigns_start_date', 'campaigns_end_date', 'campaigns_status','campaigns_title', 'campaigns_description','campaigns_location','campaigns_contract','campaigns_level', 'campaigns_skill' , 'natvie_title','natvie_description','natvie_url','natvie_image','display_title','display_description','display_url','display_image','video_title','video_description','video_url','campaign_video','audio_title','audio_description','audio_url','campaign_audio','campaigns_archive'
    ];

    /**
     * @param $value
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getNatvieImageAttribute($value){
        if ($value == NULL)
            return "";
        return url(config('constants.image.dir_path') . $value);
    }

    /**
     * @param $value
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getDisplayImageAttribute($value){
        if ($value == NULL)
            return "";
        return url(config('constants.image.dir_path') . $value);
    }

    /**
     * @param $value
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getCampaignVideoAttribute($value){
        if ($value == NULL)
            return "";
        return url(config('constants.image.dir_path') . $value);
    }

    /**
     * @param $value
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getCampaignsAudioAttribute($value){
        if ($value == NULL)
            return "";
        return url(config('constants.image.dir_path') . $value);
    }
}
