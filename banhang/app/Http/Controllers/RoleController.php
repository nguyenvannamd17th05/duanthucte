<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTraits;
use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;
use DB;  
class RoleController extends Controller
{
    use DeleteModelTraits;
    public function index(){
        $role=Role::paginate(5);
        return view('admin.role.index',compact('role'));
    }
    public function create(){

        $permission=Permission::where('parent_id',0)->get();

        return view('admin.role.add',compact('permission'));
    }
    public function created(Request $request){
        try{
            DB::beginTransaction();
            $role=Role::create([
                'name'=>$request->name,
                'display_name'=>$request->display_name,
            ]);
            $role->permissions()->attach($request->permission_id);
            DB::commit();
            return redirect()->route('roles.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::error('Message: ' .$e->getMessage().'--- Line: '.$e->getLine());
        }
    }
    public function edit($id ){
        $permission=Permission::where('parent_id',0)->get();
        $role=Role::find($id);
        $permission_check=$role->permissions;
        return view('admin.role.edit',compact('permission','role','permission_check'));
    }
    public function edited($id,Request $request){
        try{
            DB::beginTransaction();
            Role::find($id)->update([
                'name'=>$request->name,
                'display_name'=>$request->display_name,
            ]);
            $role=Role::find($id);
            $role->permissions()->sync($request->permission_id);
            DB::commit();
            return redirect()->route('roles.index');
        }catch(\Exception $e){
            DB::rollBack();
            Log::error('Message: ' .$e->getMessage().'--- Line: '.$e->getLine());
        }
        
    }
    public function delete($id){
        $model=new Role;
        return $this->DeleteModelTraits($id,$model);
    }
    public function create_permission(){
        return view('admin.permission.add');
    }
    public function created_permission(Request $request){
        $permission=Permission::create([
            'name'=>$request->module,
            'display_name'=>$request->module,
            'parent_id'=>0

        ]);
        foreach($request->module_action as $v){
            Permission::create([
            'name'=>$request->module.' '.$v,
            'display_name'=>$request->module.' '.$v,
            'parent_id'=>$permission->id,
            'key_code'=>$request->module.'_'.$v
        ]);
        }
        

    }

}
