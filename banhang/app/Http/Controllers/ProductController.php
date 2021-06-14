<?php

namespace App\Http\Controllers;
use App\Components\Recusive;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\StorageImgTraits;
use App\Models\ProductImage;
use App\Models\Tag;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Log;
use App\Models\Product as ProductModel;
use App\Traits\DeleteModelTraits;
use PHPUnit\Exception;
    
use App\Http\Requests\ProductAddRequest;
use DB;

class ProductController extends Controller
{
    use DeleteModelTraits;
    use StorageImgTraits;
    public function index(){

        $products=ProductModel::paginate(5);
        return view('admin.product.index',compact('products'));
    }
    public function create(){
        $data=$this->getParentID($parentId='');
        return view('admin.product.add',compact('data'));
    }
     public function getParentID($parentId){
        $data=Category::all();
        $recusive=new Recusive($data);
        $htmlOption=  $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function created(ProductAddRequest $request){
        try{
            DB::beginTransaction();
            $datainsert=[
            'name'=>$request->name,
            'price'=>$request->price,
            'content'=>$request->content,
            'user_id'=>Auth::id(),
            'cate_id'=>$request->cate_id
        ];
        $dataimg=$this->storageTrait($request,'img','product');
        if(!empty($dataimg)){
            $datainsert['feature_img']=$dataimg['file_path'];
            $datainsert['img_name']=$dataimg['file_name'];
        }
        $product=ProductModel::create($datainsert);
        if($request->hasFile('img_path')){
            foreach($request->img_path as $v){
                $img_multiple=$this->storageTraitMultiple($v,'product');
                $product->productimages()->create([
                    'img'=>$img_multiple['file_path'],
                    'img_name'=>$img_multiple['file_name']
                ]);
            }
        }
        if(!empty($request->tags)){
            foreach($request->tags as $tagItem){
            $tag= Tag::firstOrCreate([
                'name'=>$tagItem
            ]);
            $tagIDs[]=$tag->id;
        
            }
        }
        
        $product->tags()->attach($tagIDs);
        DB::commit();
        return redirect()->route('products.index');
        }catch(Exception $exception){
            DB::rollBack();
            Log::error('Message: ' .$exception->getMessage().'Line: '.$exception->getLine());
        }
        
    }
    public function edit($id)
    {
        $data=ProductModel::find($id);
        
        $htmlOption=$this->getParentID($data->cate_id);
        
        return view('admin.product.edit',compact('data','htmlOption'));
    }
    public function edited($id, Request $request){
        try{
            DB::beginTransaction();
            $dataupdate=[
            'name'=>$request->name,
            'price'=>$request->price,
            'content'=>$request->content,
            'user_id'=>Auth::id(),
            'cate_id'=>$request->cate_id
        ];
        $dataimg=$this->storageTrait($request,'img','product');
        if(!empty($dataimg)){
            $productdel= ProductModel::find($id);
            $datadelete=Str::substr($productdel->feature_img,9);
            Storage::delete('/public/'.$datadelete);
            $dataupdate['feature_img']=$dataimg['file_path'];
            $dataupdate['img_name']=$dataimg['file_name'];
        }
        ProductModel::find($id)->update($dataupdate);
        $product=ProductModel::find($id);
        if($request->hasFile('img_path')){
            ProductImage::where('product_id',$id)->delete();
            foreach($request->img_path as $v){
                $img_multiple=$this->storageTraitMultiple($v,'product');
                $product->productimages()->create([
                    'img'=>$img_multiple['file_path'],
                    'img_name'=>$img_multiple['file_name']
                ]);
            }
        }
        if(!empty($request->tags)){
            foreach($request->tags as $tagItem){
            $tag= Tag::firstOrCreate([
                'name'=>$tagItem
            ]);
            $tagIDs[]=$tag->id;
        
        }
        }
        
        $product->tags()->sync($tagIDs);
        DB::commit();
        return redirect()->route('products.index');
        }catch(Exception $exception){
            DB::rollback();
            Log::error('Message: ' .$exception->getMessage().'Line: '.$exception->getLine());
        }
    }
    public function delete($id){
        ProductImage::where('product_id',$id)->delete();
         $model=new ProductModel;
     return $this->DeleteModelTraits($id,$model);
    }
}
