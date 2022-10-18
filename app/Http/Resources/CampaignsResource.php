<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CampaignsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                        => $this->id,
            'campaigns_goal'            => $this->campaigns_goal,
            'audience_targeting'        => $this->audience_targeting,
            'gender'                    => $this->gender,
            'gender_group'              => $this->gender_group,
            'campaigns_start_date'      => $this->campaigns_start_date,
            'campaigns_end_date'        => $this->campaigns_end_date,
            'campaigns_status'          => $this->campaigns_status,
            'campaigns_title'           => $this->campaigns_title,
            'campaigns_description'     => $this->campaigns_description,
            'campaigns_location'        => $this->campaigns_location,
            'campaigns_contract'        => $this->campaigns_contract,
            'campaigns_level'           => $this->campaigns_level,
            'campaigns_skill'           => $this->campaigns_skill,
            'natvie_title'              => $this->natvie_title,
            'natvie_description'        => $this->natvie_description,
            'natvie_url'                => $this->natvie_url,
            'natvie_image'              => $this->natvie_image,
            'display_title'             => $this->display_title,
            'display_description'       => $this->display_description,
            'display_url'               => $this->display_url,
            'display_image'             => $this->display_image,
            'video_title'               => $this->video_title,
            'video_description'         => $this->video_description,
            'video_url'                 => $this->video_url,
            'campaign_video'            => $this->campaign_video,
            'audio_title'               => $this->audio_title,
            'audio_description'         => $this->audio_description,
            'audio_url'                 => $this->audio_url,
            'campaign_audio'            => $this->campaign_audio,
            'campaigns_archive'         => $this->campaigns_archive,
        ];
    }
}
