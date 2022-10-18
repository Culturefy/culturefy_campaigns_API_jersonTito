<?php

namespace App\Models;

use App\Traits\Scopes;
use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model
{
    use HasFactory,UploadTrait,Scopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'campaigns_goal', 'audience_targeting', 'gender', 'gender_group', 'campaigns_start_date', 'campaigns_end_date', 'campaigns_status','campaigns_title', 'campaigns_description','campaigns_location','campaigns_contract','campaigns_level', 'campaigns_skill' , 'natvie_title','natvie_description','natvie_url','natvie_image','display_title','display_description','display_url','display_image','video_title','video_description','video_url','campaign_video','audio_title','audio_description','audio_url','campaign_audio','campaigns_archive'
    ];

    /**
    * Lightweight response variable
    *
    * @var array
    */
   public $light = [ 'id', 'campaigns_goal'];

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

    /**
     * @param $query
     * @param $model
     * @param $request
     * @param $preQuery
     * @param $tablename
     * @param $groupBy
     * @param $export_select
     * @param $no_paginate
     * @return mixed
     */
    public function scopeCommonFunctionMethod($query, $model, $request, $preQuery = null, $tablename = null, $groupBy = null, $export_select = false, $no_paginate = false)
    {
        return $this->getCommonFunctionMethod($model, $request, $preQuery, $tablename , $groupBy , $export_select , $no_paginate);
    }

    /**
     * @param $model
     * @param $request
     * @param $preQuery
     * @param $tablename
     * @param $groupBy
     * @param $export_select
     * @param $no_paginate
     * @return mixed
     */
    public static function getCommonFunctionMethod($model, $request, $preQuery = null, $tablename = null, $groupBy = null, $export_select = false, $no_paginate = false)
    {
        if (is_null($preQuery)) {
            $mainQuery = $model::withSearch($request->get('search'), $export_select);
        } else {
            $mainQuery = $model->withSearch($request->get('search'), $export_select);
        }
        if($request->filled('filter') != '')
            $mainQuery = $mainQuery->withFilter($request->get('filter'));
        if(!is_null($groupBy))
            $mainQuery = $mainQuery->groupBy($groupBy);
        if ( $no_paginate ){
            return $mainQuery->withOrderBy($request->get('sort'), $request->get('order_by'), $tablename, $export_select);
        }else{
            return $mainQuery->withOrderBy($request->get('sort'), $request->get('order_by'), $tablename, $export_select)
                ->withPerPage($request->get('per_page'));
        }
    }
}
