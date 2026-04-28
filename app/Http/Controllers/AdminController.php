<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\RolePermission;
class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function team_leader(){
         $leader = User::where('role_id', 2)->get();
          $permissions = Permission::all();
        return view('admin.team-leader', compact('leader', 'permissions'));
    }

  
   public function savePermission(Request $request)
{
    $user = User::find($request->leader_id);

    $permissionIds = Permission::whereIn(
        'name',
        $request->permissions
    )->pluck('id');

   
    RolePermission::where(
      'user_id',
      $user->id
    )->delete();

    foreach($permissionIds as $pid)
    {
        RolePermission::create([
            'user_id'=>$user->id,
            'role_id'=>$user->role_id,
            'permission_id'=>$pid
        ]);
    }

    return response()->json([
      'status'=>true
    ]);
}


   public function getPermissions($id)
{
    $permissions = RolePermission::where(
        'user_id',
        $id
    )
    ->join(
        'permissions',
        'role_permission.permission_id',
        '=',
        'permissions.id'
    )
    ->pluck('permissions.name');

    return response()->json($permissions);
}



public function updateLeader(Request $request)
{
    
    $user=User::findOrFail($request->id);

    $user->update([
    'name'=>$request->name,
    'email'=>$request->email
    ]);

        return response()->json([
    'status'=>true
    ]);
}


public function deleteLeader($id)
{
$user=User::findOrFail($id);
$user->delete();

return response()->json([
 'status'=>true
]);
}
        
}
