<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SliderAddRequest;
use App\Traits\StorageImgTraits;
use App\Models\Slider;
use App\Traits\DeleteModelTraits;
use Auth;   

use Illuminate\Support\Facades\Log;
class SliderController extends Controller
{
    use DeleteModelTraits;
    use StorageImgTraits;
    
    public function index(){
        $slider=Slider::paginate(5);
        return view('admin.slider.index',compact('slider'));
    }
    public function create(){
        return view('admin.slider.add');
    }
    public function created(SliderAddRequest $request){
        try{
            $datainsert=[
            'name' =>$request->name,
            'description'=>$request->description
            ];
            $dataimg=$this->storageTrait($request,'img_path','slider');
            if(!empty($dataimg)){
                $datainsert['img_name']=$dataimg['file_name'];
                $datainsert['img_path']=$dataimg['file_path'];
            }
            Slider::create($datainsert);
            return redirect()->route('sliders.index');
        }catch(Exception $e){
            Log::error('Lỗi: '. $e->getMessage().'---Line: '. $e->getLine());
        }
        
    }
    public function edit($id){
        $slider=Slider::find($id);

        return view('admin.slider.edit',compact('slider'));
    }
    public function edited($id,Request $request)
    {
        try{
            $dataupdate=[
            'name' =>$request->name,
            'description'=>$request->description
            ];
            $dataimg=$this->storageTrait($request,'img_path','slider');
            if(!empty($dataimg)){
                $dataupdate['img_name']=$dataimg['file_name'];
                $dataupdate['img_path']=$dataimg['file_path'];
            }
            Slider::find($id)->update($dataupdate);
            return redirect()->route('sliders.index');
        }catch(Exception $e){
            Log::error('Lỗi: '. $e->getMessage().'---Line: '. $e->getLine());
        }
        
    }
    public function delete($id){
        $model=new Slider;
     return $this->DeleteModelTraits($id,$model);
        
    }
}
