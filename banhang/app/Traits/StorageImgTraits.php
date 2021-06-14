<?php 

namespace App\Traits;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


trait StorageImgTraits{
	public function storageTrait($request,$field_name,$foldername){

		if($request->hasFile($field_name)){
		$img= $request->$field_name;
        $img_origin=$img->getClientOriginalName();
        $img_hash=Str::random(20).'.'.$img->getClientOriginalExtension();
        $img_path=$request->file($field_name)->storeAs('public/'.$foldername.'/'.Auth::id(),$img_hash);
        $data=[
            'file_name'=>$img_origin,
            'file_path'=>Storage::url($img_path)
         ];
         return $data; 
		}
		return null;
         
	}
	public function storageTraitMultiple($file,$foldername){
		
        $img_origin=$file->getClientOriginalName();
        $img_hash=Str::random(20).'.'.$file->getClientOriginalExtension();
        $img_path=$file->storeAs('public/'.$foldername.'/'.Auth::id(),$img_hash);
        $data=[
            'file_name'=>$img_origin,
            'file_path'=>Storage::url($img_path)
         ];
         return $data; 
		 
         
	}
	
}