<?php

namespace App\Http\Controllers;
use App\Components\MenuRecusive;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $recusive;
    public function __construct(MenuRecusive $MenuRecusive){
        $this->recusive=$MenuRecusive;
    }
    public function index()
    {
        $data=Menu::paginate(5);
        return view('admin.menu.index', compact('data'));
    }
    public function create(){
        $html=$this->recusive->menuRecusiveAdd();
        return view('admin.menu.add',compact('html'));
    }
    public function created(Request $request)
    {
        Menu::create([
            'name'=> $request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>Str::slug($request->name)
        ]);
        return redirect()->route('menus.index');
    }
    public function edit($id){
        
        $data=Menu::find($id);
        $html=$this->recusive->menuRecusiveEdit($data->parent_id);
        return view('admin.menu.edit',compact('data','html'));
    }
    public function edited($id, Request $request){
        Menu::find($id)->update([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>Str::slug($request->name)

        ]);
        return redirect()->route('menus.index');
    }
    public function delete($id){
        Menu::find($id)->delete();
        return redirect()->route('menus.index');
    }
    
}
