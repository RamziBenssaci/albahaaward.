<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Jobs\SendEmailJob;
use App\Mail\SendReplyToGuest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\ContactReplie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $contacts = Contact::all();
        return view('panel.contacts.index', compact('contacts','categories'));
    }

    public function datatable(Request $request)
    {
        $user = Auth::user();
        $resource = ContactResource::class;
        if ($user->userType == 'user'){
            $items = Contact::query()->where('user_id',$user->id)
                ->search($request)
                ->orderBy('id', 'desc');
        }else{
            $items = Contact::query()
                ->search($request)
                ->orderBy('id', 'desc');
        }

        return filterDataTable($items, $request, null, $resource);
    }

    public function requests(Request $request,$id)
    {
        $contact = Contact::query()->find($id);
        if ($contact){
            return view('panel.contacts.details', compact('contact'));
        }else{
            abort('404');
        }
    }

    public function reply(Request $request,$id)
    {
        $user = Auth::user();
        if ($user->userType == 'user'){
            abort(403);
        }
        $validator = Validator::make($request->all(), [
            'message' => 'required|max:10000',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors(),]);
        }

        $contact = Contact::query()->find($id);
        $contact->is_reply = 1;
        $contact->save();

        ContactReplie::create([
            'contact_id' => $id,
            'user_id' => auth()->user()->id,
            'reply' => $request->message,
            'created_at' => now(),
        ]);

        $details = [
            'email' => $contact->user->email,
            'title' => 'بريد الكتروني من جائزة الباحة للأبداع والتميز',
            'title_2' => 'الرد على تذكرة الدعم',
            'reply' => $request->message,
            'name' => $contact->user->name,
            'body' => $contact->description,
        ];
            // Send the email using Mail::to
        try {
            Mail::to($contact->user->email)->send(new SendReplyToGuest($details));
        } catch (\Exception $e) {
            \Log::error('Email sending failed: ' . $e->getMessage());
        }

//        try {
//        dispatch(new SendEmailJob($details))->onQueue('send_mail')->onConnection('database')->delay(30);
//        } catch (\Exception $e) {
//            dd($e);
//        }

        return response()->json(['status' => true, 'message' => trans('operation success'),]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors(),]);
        }

        Contact::create([
            'category_id' => $request->category_id,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
        ]);
        return response()->json(['status' => true, 'message' => trans('operation success'),]);

    }

    public function show(Contact $contact)
    {
        //
    }

    public function edit(Contact $contact)
    {
        //
    }

    public function update(Request $request, Contact $contact)
    {
        //
    }

    public function destroy(Contact $contact)
    {
        //
    }
}
