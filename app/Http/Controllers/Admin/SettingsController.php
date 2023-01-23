<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller{
    public function index(){
        return response()->json(['data' => Setting::first()]);
    }
    public function manage(){
        $data['activePage'] = ['settings' => 'settings'];
        $data['breadcrumb'] = [
            ['title' => 'settings'],
        ];
        $item = Setting::query()->first();
        // return $item;
        return view('admin.settings.edit', ['item' => $item,'data' => $data]);
    }

    public function show($id){
        $item = Setting::whereId($id)->first();
        $images_new  = collect([]);
        $new['url'] =  $item->logo;
        $new['name'] = $item->logo;
        $images_new->push($new);
        return response()->json($images_new,200);
    }

    public function update(Request $request, $id){
        DB::beginTransaction();
        try{
            $item = Setting::whereId($id)->first();
            $item->who_are = $request->who_are;
            $item->our_vision = $request->our_vision;
            $item->our_history = $request->our_history;
            // $item->footer = $request->footer;
            $item->address = $request->address;
            $item->Schedule = $request->Schedule;
            $item->copy_right = $request->copy_right;
            $item->email = $request->email;
            $item->mobile_no = $request->mobile_no;
            $item->header_video = $request->header_video;
            
            $item->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['message' => $e->getMessage()], 403);
        }
        return response()->json(['message' => 'ok','data' => $item]);
    }
    public function addImage(Request $request){
        $item = Setting::first();
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $item->logo !== null ?Storage::disk('public')->delete($item->logo): '';
            $uploadedFile = $request->file('file');
            $logo = $uploadedFile->store('/', 'public');
            $item->logo = $logo;
            $item->save();
            return response()->json(['message' => 'ok']);
        }

    }

    public function removeImage(Request $request, $id){
        $item = Setting::where('image',$id)->first();
        $item->logo !== null ?Storage::disk('public')->delete($item->logo): '';
        $item->logo = null;
        $item->save();
        return response()->json(['message' => 'ok']);
    }
}
