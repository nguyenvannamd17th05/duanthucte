<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\SettingAddRequest;
use App\Traits\DeleteModelTraits;

class SettingController extends Controller
{
     use DeleteModelTraits;
   public function index(){
        $setting=Setting::paginate(5);
        return view('admin.setting.index',compact('setting'));
   }
   public function create(){
        return view('admin.setting.add');
   }
   public function created(SettingAddRequest $request){
       Setting::create([
            'config_key'=>$request->config_key,
            'config_value'=>$request->config_value,
            'type'=>$request->type
       ]);
       return redirect()->route('settings.index');
   }
   public function edit($id){
        $setting=Setting::find($id);
        return view('admin.setting.edit',compact('setting'));
   }
   public function edited($id,Request $request){
        Setting::find($id)->update([
            'config_key' => $request->config_key,
            'config_value'=>$request->config_value
        ]);

        return redirect()->route('settings.index');
   }
   public function delete($id){
     $model=new Setting;
     return $this->DeleteModelTraits($id,$model);
   }
}
