<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmployees;
use App\Http\Requests\CreatePage;
use App\Http\Requests\UpdateEmployees;
use App\Http\Requests\UpdatePage;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\PagesResource;
use App\Http\Resources\UserResource;
use App\Models\ContactReplie;
use App\Models\Page;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index()
    {
        $roles = Role::query()->whereNot('name', 'web')->get();
        return view('panel.users.index', compact('roles'));
    }

    public function datatable(Request $request)
    {
        $resource = UserResource::class;
        $items = User::query()->where('userType', 'user')
            ->search($request)
            ->orderBy('id', 'desc');
        return filterDataTable($items, $request, null, $resource);
    }

    public function create(Request $request){
        return view('panel.users.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string', 'max:255'],
            'email' => ['required','email', 'max:255', Rule::unique(User::class)],
            'avatar' => ['mimes:jpeg,jpg,png,gif','max:10000'],
            'password' => ['max:255'],
            'gender' => ['string', 'max:255'],
            'ssn' => ['integer', 'min:1'],
            'nationality' => ['string', 'max:255'],
            'country' => ['string', 'max:255'],
            'city' => ['string', 'max:255'],
            'course' => ['string', 'max:255'],
            'specialization' => ['string', 'max:255'],
            'area_of_specialization' => ['string', 'max:255'],
            'job' => ['string', 'max:255'],
            'cv_description' => ['string', 'max:500'],
            'phone' => ['integer', 'min:1'],
            'section' => ['string', 'max:255'],
        ]);
        $user = new User();
        if ($request->hasFile('avatar')) {
            $image = uploadImage($request, $request->avatar);
            $user->image = $image ;
        }
        if (!empty($request->password)){
            $user->password = $request->password ;
        }
        $user->name = $request->name ;
        $user->ssn = $request->ssn ;
        $user->email = $request->email ;
        $user->gender = $request->gender ;
        $user->nationality = $request->nationality ;
        $user->country = $request->country ;
        $user->city = $request->city ;
        $user->course = $request->course ;
        $user->specialization = $request->specialization ;
        $user->area_of_specialization = $request->area_of_specialization ;
        $user->job = $request->job ;
        $user->cv_description = $request->cv_description ;
        $user->phone = $request->phone ;
        $user->section = $request->section ;
        $user->userType = 'user' ;
        $user->save();

        toastr()->success('تم انشاء المستخدم بنجاح', 'نجاح');

        return Redirect::route('users.index');
    }

    public function edit($id)
    {
        $user = User::query()->find($id);
        return view('panel.users.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $validated = $request->validate([
            'name' => ['required','string', 'max:255'],
            'email' => ['required','email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'avatar' => ['mimes:jpeg,jpg,png,gif','max:10000'],
            'password' => ['max:255'],
        ]);
        if (empty($user)) {
            return response_web(false, translate('User not found'));
        }
        if ($request->hasFile('avatar')) {
            $filePath = public_path('images/' . $user->avatar);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            $image = uploadImage($request, $request->avatar);
            $user->image = $image ;
        }
        if (!empty($request->password)){
            $user->password = $request->password ;
        }
        $user->name = $request->name ;
        $user->ssn = $request->ssn ;
        $user->email = $request->email ;
        $user->gender = $request->gender ;
        $user->nationality = $request->nationality ;
        $user->country = $request->country ;
        $user->city = $request->city ;
        $user->course = $request->course ;
        $user->specialization = $request->specialization ;
        $user->area_of_specialization = $request->area_of_specialization ;
        $user->job = $request->job ;
        $user->cv_description = $request->cv_description ;
        $user->phone = $request->phone ;
        $user->section = $request->section ;
        $user->save();

        toastr()->success('تم تحديث بيانات المستخدم بنجاح', 'نجاح');
        return Redirect::route('users.index');
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
            $user->orders()->delete();
            $user->delete();
        }
        return response()->json(['status' => true, 'message' => trans('operation success'),]);

    }
}
