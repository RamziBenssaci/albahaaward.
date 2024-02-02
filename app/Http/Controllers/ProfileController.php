<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Contest;
use App\Models\Order;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function dashboard(Request $request)
    {
        if (Auth::user()->userType == 'user') {
            return redirect()->route('profile.index');
        }
        $users = User::query()->count();
        $orders = Order::query()->count();
        $contest = Contest::query()->count();
        return view('panel.dashboard', compact('users', 'orders', 'contest'));
    }

    public function index()
    {
        $user = Auth::user();
        if ($user->userType == 'user'){
        return view('panel.profile', compact('user'));
        }
        abort(403);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        //
    }

    public function update(Request $request)
    {
//        dd($request->all());
        $auth = Auth::user();
        $requiredAttributes = [
            'name', 'email', 'password', 'userType', 'ssn',
            'image', 'gender', 'nationality', 'country', 'course',
            'specialization', 'area_of_specialization', 'job', 'cv_description', 'phone', 'section'
        ];
        $allAttributesNotNull = true;
        foreach ($requiredAttributes as $attribute) {
            if ($auth->{$attribute} == null) {
                $allAttributesNotNull = false;
                break;
            }
        }
        if ($allAttributesNotNull) {
            toastr()->error('لا يمكن تعديل الملف الشخصي .. يمكنك التواصل مع الادارة', 'خطأ');
            return Redirect::route('profile.index');

        } else {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', Rule::unique(User::class)->ignore(Auth::user()->id)],
                'avatar' => ['mimes:jpeg,jpg,png,gif', 'max:10000'],
                'password' => ['max:255'],
                'gender' => ['required', 'string', 'max:255'],
                'ssn' => ['required', 'integer', 'min:1'],
                'nationality' => ['required', 'string', 'max:255'],
                'country' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'course' => ['required', 'string', 'max:255'],
                'specialization' => ['required', 'string', 'max:255'],
                'area_of_specialization' => ['required', 'string', 'max:255'],
                'job' => ['required', 'string', 'max:255'],
                'cv_description' => ['required', 'string', 'max:500'],
                'phone' => ['required', 'integer', 'min:1'],
                'section' => ['required', 'string', 'max:255'],
            ]);


            $user = Auth::user();
            if ($request->avatar == null && $user->image == null) {
                return redirect()->route('profile.index')->withErrors(['avatar' => 'الصورة مطلوبه']);
            }

            if ($request->hasFile('avatar')) {
                $filePath = public_path('images/' . $user->image);
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
                $image = uploadImage($request, $request->avatar);
                $user->image = $image;
            }
            if (!empty($request->password)) {
                $user->password = $request->password;
            }
            $user->name = $request->name;
            $user->ssn = $request->ssn;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->nationality = $request->nationality;
            $user->country = $request->country;
            $user->city = $request->city;
            $user->course = $request->course;
            $user->specialization = $request->specialization;
            $user->area_of_specialization = $request->area_of_specialization;
            $user->job = $request->job;
            $user->cv_description = $request->cv_description;
            $user->phone = $request->phone;
            $user->section = $request->section;
            $user->save();
            toastr()->success('تم تحديث الملف الشخصي', 'نجاح');

            return Redirect::route('profile.index');
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
