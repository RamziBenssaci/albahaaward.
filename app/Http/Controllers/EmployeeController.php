<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmployees;
use App\Http\Requests\CreatePage;
use App\Http\Requests\UpdateEmployees;
use App\Http\Requests\UpdatePage;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\PagesResource;
use App\Models\ContactReplie;
use App\Models\Page;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{

    public function index()
    {
        $roles = Role::query()->whereNot('name', 'web')->get();
        return view('panel.employees.index', compact('roles'));
    }

    public function datatable(Request $request)
    {
        $resource = EmployeeResource::class;
        $items = User::query()->whereNot('userType', 'admin')
            ->whereNot('userType', 'user')
            ->search($request)
            ->orderBy('id', 'desc');

        return filterDataTable($items, $request, null, $resource);
    }

    public function store(CreateEmployees $request)
    {
//        dd($request->all());
        $data = $request->only('name', 'email', 'mobile', 'password');
        $data['role_id'] = $request->role_id;
        $data['userType'] = 'employee';
        $data['phone'] = $request->mobile;
        $data['email_verified_at'] = now();
        if ($request->hasFile('image')) {
            $data['image'] = uploadImage($request, $request->file('image'));
        }
        $saved = User::query()->create($data);
        if ($request->role_id) {
            $role = Role::query()->find($request['role_id']);
            $saved->syncRoles($role->id);
        }

        return response()->json(['status' => true, 'message' => trans('operation success'),]);
    }

    public function edit($id)
    {
        $user = User::query()->find($id);
        if ($user){
            $role_id = $user->roles->pluck('id')->first();

            return response()->json(['status' => true, 'data' => $user, 'role_id' => $role_id]);
        }else{
            abort('404');
        }

    }

    public function update(UpdateEmployees $request, $id)
    {
        $item = User::find($id);
        if (empty($item)) {
            return response_web(false, translate('User not found'));
        }
        $data = $request->only('name', 'email', 'mobile', 'password');
        $data['role_id'] = $request->role_id;
        if ($request->hasFile('image')) {
            $data['image'] = uploadImage($request, $request->file('image'));
        }
        if (!empty($request->password)) {
            $data['password'] = $request->password;
        }
        $updated = $item->update($data);
        if ($request->role_id) {
            $item->syncRoles([$request['role_id']]);
        }

        return response()->json(['status' => true, 'message' => trans('operation success'),]);
    }

    public function disable($id)
    {
        $user = User::query()->find($id);
        if ($user) {
            $user->status = !$user->status;
            $user->save();
        }
        return response()->json(['status' => true, 'message' => trans('operation success'),]);
    }

    public function destroy($id)
    {
        $user = User::query()->find($id);
        if ($user) {
            $user->roles()->detach();
            $user->delete();
        }
        return response()->json(['status' => true, 'message' => trans('operation success'),]);

    }
}
