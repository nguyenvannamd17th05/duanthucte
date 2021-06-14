<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Exception;
use DB;    
use App\Traits\DeleteModelTraits;
class AdminUserController extends Controller
{
    use DeleteModelTraits;
    public function index(){
        $user=User::paginate(5);
        return view('admin.user.index',compact('user'));
    }
    public function create(){
        $role=Role::all();
        return view('admin.user.add',compact('role'));
    }
    public function created(Request $request){
        try{
            DB::beginTransaction();
            $user=User::create([
                'name' => $request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            $role_id=$request->role_id;
            $user->roles()->attach($role_id);
            DB::commit();
            return redirect()->route('users.index');

        }catch(\Exception $e){
            DB::rollBack();
            Log::error('Message: ' .$e->getMessage().'--- Line: '.$e->getLine());
        } 
    }
    public function edit($id){
        $role=Role::all();
        $user=User::find($id);
        $roleuser=$user->roles;
        return view('admin.user.edit',compact('role','user','roleuser'));
    }
    public function edited($id,Request $request){
         try{
            DB::beginTransaction();
            User::find($id)->update([
                'name' => $request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            $user=User::find($id);
            $role_id=$request->role_id;
            $user->roles()->sync($role_id);
            DB::commit();
            return redirect()->route('users.index');

        }catch(\Exception $e){
            DB::rollBack();
            Log::error('Message: ' .$e->getMessage().'--- Line: '.$e->getLine());
        } 
    }
    public function delete($id){
        $model= new User;
        return $this->DeleteModelTraits($id,$model);
    }   

}
