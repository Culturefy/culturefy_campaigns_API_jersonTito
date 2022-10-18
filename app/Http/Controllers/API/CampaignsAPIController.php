<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CampaignsRequest;
use App\Http\Resources\CampaignsCollection;
use App\Http\Resources\CampaignsResource;
use App\Http\Resources\DataTrueResource;
use App\Models\Campaigns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\UploadTrait;

class CampaignsAPIController extends Controller
{
    use UploadTrait;

    public function index()
    {
        $campaigns = Campaigns::all();
        return new CampaignsCollection(CampaignsResource::collection($campaigns),CampaignsResource::class);
    }

    public function show(Campaigns $campaigns)
    {
        return new CampaignsResource($campaigns);
    }

    public function store(CampaignsRequest $request)
    {
        $data = $request->all();
        $campaigns = Campaigns::create($data);

        if($request->hasFile('natvie_image')){
            $path = $this->uploadOne($request->file('natvie_image'),'/native/'.$campaigns->id);
            $campaigns->update(['natvie_image' => $path]);
        }
        if($request->hasFile('display_image')){
            $path = $this->uploadOne($request->file('display_image'),'/display/'.$campaigns->id);
            $campaigns->update(['display_image' => $path]);
        }
        if($request->hasFile('campaign_video')){
            $path = $this->uploadOne($request->file('campaign_video'),'/video/'.$campaigns->id);
            $campaigns->update(['campaign_video' => $path]);
        }
        if($request->hasFile('campaign_audio')){
            $path = $this->uploadOne($request->file('campaign_audio'),'/audio/'.$campaigns->id);
            $campaigns->update(['campaign_audio' => $path]);
        }

        return new CampaignsResource($campaigns);
    }

    public function update(CampaignsRequest $request, Campaigns $campaigns)
    {
        $data = $request->all();

        if($request->hasfile('natvie_image')) { // update user profile image in database.
            $this->deleteOne('/native/' . $campaigns->id . '/' . basename($campaigns->natvie_image));
            $path = $this->uploadOne($request->file('natvie_image'), '/native/' . $campaigns->id);
            $campaigns->update(['natvie_image' => $path]);
        }
        if($request->hasfile('display_image')) { // update user profile image in database.
            $this->deleteOne('/display/' . $campaigns->id . '/' . basename($campaigns->display_image));
            $path = $this->uploadOne($request->file('display_image'), '/display/' . $campaigns->id);
            $campaigns->update(['display_image' => $path]);
        }
        if($request->hasfile('campaign_video')) { // update user profile image in database.
            $this->deleteOne('/video/' . $campaigns->id . '/' . basename($campaigns->campaign_video));
            $path = $this->uploadOne($request->file('campaign_video'), '/video/' . $campaigns->id);
            $campaigns->update(['campaign_video' => $path]);
        }
        if($request->hasfile('campaign_audio')) { // update user profile image in database.
            $this->deleteOne('/audio/' . $campaigns->id . '/' . basename($campaigns->campaign_audio));
            $path = $this->uploadOne($request->file('campaign_audio'), '/audio/' . $campaigns->id);
            $campaigns->update(['campaign_audio' => $path]);
        }

        $campaigns->update($data);
        return new CampaignsResource($campaigns);
    }

    public function destory(Request $request, Campaigns $campaigns)
    {
        Storage::deleteDirectory('/native/'.$campaigns->campaigns_id);
        Storage::deleteDirectory('/display/'.$campaigns->campaigns_id);
        Storage::deleteDirectory('/video/'.$campaigns->campaigns_id);
        Storage::deleteDirectory('/audio/'.$campaigns->campaigns_id);
        $campaigns->delete();

        return new DataTrueResource($campaigns);
    }

    public function archiveCampaign(Request $request,Campaigns $campaigns)
    {
        if($request['campaigns_archive'] == '1'){
            $campaigns->update([
                'campaigns_archive' => config('constants.campaigns.campaigns_archive')
            ]);
            return response()->json(['success'=> config('constants.messages.change_success')]);
        } else {
            $campaigns->update([
                'campaigns_archive' => config('constants.campaigns.campaigns_unarchive')
            ]);
            return response()->json(['success'=> config('constants.messages.change_un_success')]);
        }

    }
}
