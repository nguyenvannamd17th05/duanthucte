<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Models\Category;
class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category){
        $this->category=$category;
    }
    public function index(){
        $category=$this->category->paginate(5);
        return view('admin.category.index',compact('category'));
    }
    public function create(){
        $htmlOption=$this->getParentID($parentId='');
        return view('admin.category.add',['data'=>$htmlOption]);
    }
    public function created(Request $request){
        $this->category->create([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>Str::slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }
    public function getParentID($parentId){
        $data=$this->category->all();
        $recusive=new Recusive($data);
        $htmlOption=  $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function edit($id){
        $category=$this->category->find($id);
        $htmlOption=$this->getParentID($category->parent_id);

        return view('admin.category.edit',compact('category','htmlOption'));
    }
    public function edited($id, Request $request)
    {
        $category=$this->category->find($id)->update([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>Str::slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }
    public function delete($id){
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }
}
