<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePermissions;
use App\Http\Requests\UpdatePermissions;
use App\Http\Resources\PermissionResource;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::query()->select('id', 'name', DB::raw("substring(name,1,LOCATE('.',name)-1) as group_name"))
            ->orderBy('name', 'desc')
            ->get();

        return view('panel.permissions.index', compact('permissions'));
    }

    public function datatable(Request $request)
    {
        $items = Role::query();
        $resource = PermissionResource::class;
        return filterDataTable($items, $request, null, $resource);
    }

    public function active($id)
    {
        $item = User::query()->employee()->find($id);
        if (empty($item)) {
            return response_web(true, translate('Employee not found'));
        }
        $item->is_active = 1 - $item->is_active;
        $item->save();
        return response_web(true, translate('Status changed successfully'));
    }

    public function store(CreatePermissions $request)
    {
        DB::beginTransaction();

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        if ($request->has('user_management_read')) {
            foreach ((array)$request->user_management_read as $permission) {
                $role->givePermissionTo($permission);
            }
        }

        DB::commit();

        return response()->json(['status' => true, 'message' => trans('operation success'),]);
    }

    public function edit($id)
    {
        $item = Role::find($id);
        if (empty($item)) {
            return response_web(false, translate('Role not found'));
        }

        $rolePermissions = $item->permissions->pluck('id')->toArray();
        return response()->json(['status' => true, 'item' => $item, 'permissions' => $rolePermissions]);

    }

    public function update($id, UpdatePermissions $request)
    {
//        try {
        $item = Role::query()->find($id);
        $item->name = $request->name;
        $item->save();
        DB::beginTransaction();
        $item->syncPermissions($request->user_management_read);
        DB::commit();

//        } catch (\Throwable $th) {
//            DB::rollback();
//        }

        return response()->json(['status' => true]);
    }

    public function destroy($id)
    {
        $item = Role::query()->find($id);
        $ModelRole = DB::table('model_has_roles')->where('role_id', $item->id)
            ->exists();

        if (empty($item)) {
            return response()->json(['status' => false, 'message' => translate('Something went wrong!')]);
        }
        try {
            if ($item->id == 1) {
                return response()->json(['status' => false, 'message' => translate('Administrator permission cannot be deleted')]);
            }

            if ($ModelRole) {
                return response()->json(['status' => false, 'message' => translate('Permission cannot be deleted because it is owned by other users')]);
            }

            DB::table('role_has_permissions')->where('role_id', $item->id)->delete();
            DB::table('model_has_roles')->where('role_id', $item->id)->delete();
            $item->delete();

            return response()->json(['status' => true]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => translate('Something went wrong!')]);
        }
    }
}
