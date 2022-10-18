<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'campaigns_goal'            => 'required',
            'audience_targeting'        => 'required',
            'gender'                    => 'required',
            'gender_group'              => 'required',
            'campaigns_start_date'      => 'required',
            'campaigns_end_date'        => 'required',
            'campaigns_status'          => 'required',
            'campaigns_title'           => 'required',
            'campaigns_description'     => 'required',
            'campaigns_location'        => 'required',
            'campaigns_contract'        => 'required',
            'campaigns_level'           => 'required',
            'campaigns_skill'           => 'required',
            'natvie_title'              => 'nullable',
            'natvie_description'        => 'nullable',
            'natvie_url'                => 'nullable',
            'natvie_image'              => 'nullable',
            'display_title'             => 'nullable',
            'display_description'       => 'nullable',
            'display_url'               => 'nullable',
            'display_image'             => 'nullable',
            'video_title'               => 'nullable',
            'video_description'         => 'nullable',
            'video_url'                 => 'nullable',
            'campaign_video'            => 'nullable',
            'audio_title'               => 'nullable',
            'audio_description'         => 'nullable',
            'audio_url'                 => 'nullable',
            'campaign_audio'            => 'nullable',
        ];
    }
}
