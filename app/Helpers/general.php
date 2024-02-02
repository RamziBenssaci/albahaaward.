<?php

use App\Jobs\SendEmailJob;
use App\Logic\ImageRepository;
use App\Mail\SendReplyToGuest;
use App\Mail\SendReplyToUser;
use App\Models\Image;
use App\Models\Translation;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes(array $routes, $output = "active")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) return $output;
        }
    }
}

function locales()
{
    $except_arr = ['zh'];
    $arr = [];
    foreach (LaravelLocalization::getSupportedLocales() as $key => $value) {
        if (!in_array($key, $except_arr)) {
            $arr[$key] = __('translate.' . $key);
        }
    }
    return $arr;
}

function load_image($image)
{
    return asset('assets/img') . '/' . $image;
}

function lang()
{
    return \Illuminate\Support\Facades\App::getLocale();
}

function stringNumberToInteger($string)
{
    return strtr($string, array('۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9', '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9'));
}

function reArrangeteleinputData(\Illuminate\Http\Request $request)
{
    $request['mobile'] = ltrim(stringNumberToInteger($request->mobile), '0');
    $request['dial_code'] = ltrim(stringNumberToInteger($request->dial_code), '+');
    $request['mobile'] = $request['dial_code'] . $request['mobile'];
    return $request;
}

function response_web($status, $message, $items = null, $statusCode = 200)
{
    $response = ['status' => $status, 'message' => $message];
    if ($status && isset($items)) {
        $response['item'] = $items;
    } else {
        $response['errors_object'] = $items;
    }
    return response($response, $statusCode);
}

function translate($key, $lang = null, $addslashes = false)
{
    if ($lang == null) {
        $lang = app()->getLocale();
    }

    $lang_key = preg_replace('/[^A-Za-z0-9\_]/', '', str_replace(' ', '_', strtolower($key)));

    $translations_en = Cache::rememberForever('translations-en', function () {
        return Translation::where('lang', 'en')->pluck('lang_value', 'lang_key')->toArray();
    });

    if (!isset($translations_en[$lang_key])) {
        $translation_def = new Translation;
        $translation_def->lang = 'en';
        $translation_def->lang_key = $lang_key;
        $translation_def->lang_value = str_replace(array("\r", "\n", "\r\n"), "", $key);
        $translation_def->save();
        Cache::forget('translations-en');
    }

    // return user session lang
    $translation_locale = Cache::rememberForever("translations-{$lang}", function () use ($lang) {
        return Translation::where('lang', $lang)->pluck('lang_value', 'lang_key')->toArray();
    });
    if (isset($translation_locale[$lang_key])) {
        return $addslashes ? addslashes(trim($translation_locale[$lang_key])) : trim($translation_locale[$lang_key]);
    }

    // return default lang if session lang not found
    $translations_default = Cache::rememberForever('translations-' . env('DEFAULT_LANGUAGE', 'en'), function () {
        return Translation::where('lang', env('DEFAULT_LANGUAGE', 'en'))->pluck('lang_value', 'lang_key')->toArray();
    });
    if (isset($translations_default[$lang_key])) {
        return $addslashes ? addslashes(trim($translations_default[$lang_key])) : trim($translations_default[$lang_key]);
    }

    // fallback to en lang
    if (!isset($translations_en[$lang_key])) {
        return trim($key);
    }
    return $addslashes ? addslashes(trim($translations_en[$lang_key])) : trim($translations_en[$lang_key]);
}

function uploadImage($request, $name)
{
    $photo = $name;
    if (!is_file($name)) return new Image();
    $extension = $photo->getClientOriginalExtension();
    $filename = 'image_' . time() . mt_rand();
    $repo = new ImageRepository();
    $allowed_filename = $repo->createUniqueFilename($filename, $extension);

    $destinationPath = 'images';
    $myimage = $name->getClientOriginalName();
    $name->move(public_path($destinationPath), $allowed_filename);

//    $uploadSuccess1 = $repo->original($photo, $allowed_filename);
//    $originalName = str_replace('.' . $extension, '', $photo->getClientOriginalName());
//    if (!$uploadSuccess1 || !$extension) {
//        return Response::json([
//            'error' => true,
//            'message' => 'Server error while uploading',
//        ], 500);
//    }
//    $image = new Image();
//    $image->display_name = $originalName . '.' . $extension;
//    $image->file_name = $allowed_filename;
//    $image->mime_type = $extension;
//    $image->save();
    return $allowed_filename;
}

function uploadFile($request, $name)
{
    $photo = $name;
    if (!is_file($name)) return new Image();
    $extension = $photo->getClientOriginalExtension();
    $filename = 'file_' . time() . mt_rand();
    $repo = new ImageRepository();
    $allowed_filename = $repo->createUniqueFilename($filename, $extension);

    $destinationPath = 'files';
    $myimage = $name->getClientOriginalName();
    $name->move(public_path($destinationPath), $allowed_filename);

//    $uploadSuccess1 = $repo->original($photo, $allowed_filename);
//    $originalName = str_replace('.' . $extension, '', $photo->getClientOriginalName());
//    if (!$uploadSuccess1 || !$extension) {
//        return Response::json([
//            'error' => true,
//            'message' => 'Server error while uploading',
//        ], 500);
//    }
//    $image = new Image();
//    $image->display_name = $originalName . '.' . $extension;
//    $image->file_name = $allowed_filename;
//    $image->mime_type = $extension;
//    $image->save();
    return $allowed_filename;
}

function image_url($img, $size = '', $type = '')
{
    if (str_contains($img, 'http') or str_contains($img, 'https')) {
        return $img;
    }
    if (empty($img)) {
        return !empty($type) ? asset('images/avatar.png') : asset('companyAssets/assets/images/logo.svg');
    }

    if (!empty($type)) {
        return (!empty($size)) ? url('/uploads/images/' . $size . '/' . $img) . '?type=' . $type : url('/uploads/images/' . $img) . '?type=' . $type;
    }

    return (!empty($size)) ? url('/uploads/images/' . $size . '/' . $img) : url('/uploads/images/' . $img);
}

if (!function_exists('vAsset')) {
    function vAsset($url)
    {
        return asset($url . '?ver=' . now()->timestamp);
    }
}

function filterDataTable($items, $request, $take = null, $resource = null)
{
    if ($items->count() <= 0) {
        $data['recordsTotal'] = 0;
        $data['recordsFiltered'] = 0;
        $data['data'] = [];
        return $data;
    }
    if (!$resource) {
        $resource = $items->first()->resource;
    }
    if (isset($take)) {
        $items = $items->take($take)->get();
        $data = $resource->collection($items);
        return $data;
    }
    $per_page = isset($request->length) ? $request->length : 10;
    $page = isset($request->start) ? $request->start : 1;
    if ($per_page == -1 || $per_page == null) {
        $per_page = 10;
    }
    $itemsCount = $items->count();
    $items = $items->take($per_page)->skip($page)->get();
    $data['recordsTotal'] = $itemsCount;
    $data['recordsFiltered'] = $itemsCount;
    $data['data'] = $resource::collection($items);
    return $data;
}


function errorResponse($message, $code = 422)
{
    $array = [
        'status' => false,
        'message' => $message,
        'data' => null,
    ];
    return response($array, $code);
}

function sendMessageToUltraMsg($msg,$to)
{
    $url = 'https://api.ultramsg.com/' . env('INSTANCE') .'/messages/chat';
    $token = env('TOKEN_ULTRA_MSG');
    $messageData = [
        'token' => $token,
        'to' => $to,
        'body' => $msg,
    ];
    $client = new Client();

    try {
        $response = $client->post($url, [
            'form_params' => $messageData,
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'verify' => false, // Disable SSL verification (not recommended for production)
        ]);
        $responseData = $response->getBody();
        return $responseData;
    } catch (Exception $e) {
//        return 'Error: ' . $e->getMessage();
    }
}

function get_setting($key, $default = null, $lang = false)
{
    $settings = Cache::remember('business_settings', 86400, function () {
        return \App\Models\Setting::all();
    });

    if ($lang == false) {
        $setting = $settings->where('s_key', $key)->first();
    } else {
        $setting = $settings->where('s_key', $key)->where('lang', $lang)->first();
        $setting = !$setting ? $settings->where('s_key', $key)->first() : $setting;
    }
    return $setting == null ? $default : $setting->s_value;
}

function send_email($msg,$user){
    $details = [
        'email' => $user->email,
        'title' => 'بريد الكتروني من جائزة الباحة للأبداع والتميز',
        'title_2' => 'تغير حاله طلبكم المقدم',
        'reply' => $msg,
        'name' => $user->name,
    ];
    try {
        $data = $details;
        Mail::to($data['email'])->send(new SendReplyToUser($data));
//        dispatch(new SendEmailJob($details))->onQueue('send_mail')->onConnection('database')->delay(30);
        } catch (\Exception $e) {
        \Log::error('Email sending failed: ' . $e->getMessage());
    }
//    try {
//            Mail::to($user->email)->send(new \App\Mail\SendReplyToUser($details));
//        } catch (\Exception $e) {
//        \Log::error('Email sending failed: ' . $e->getMessage());
//    }
}
function send_message($key,$user,$key2)
{
    if ($key == 6){
        $msg =  'شكرا لأنضمامك لموقع جائزة الباحة للأبداع والتميز. تم تفعيل عضويتك ويمكنك الدخول لموقعنا عبر : '  . \route('login');;
        send_email($msg,$user);
        return $msg;
    }elseif ($key == 7){
        $msg = 'بناء على طلبك. يمكنك انشاء كلمة سر جديد بالضغط على الرابط التالي : '  . \route('login');
        send_email($msg,$user);
        return $msg;
    }elseif ($key == 1){
        $msg = 'شكرا لك يا '  . $user->name . ' تم استقبال طلبك  وسيصلكم تحديث قريب بخصوص طلبكم. ';
        send_email($msg,$user);
        return $msg;
    }elseif ($key == 2){
        $msg = 'عزيزي / تي ' . $user->name . ' نشعركم بأنه تم تقييم طلبكم مبدئيأ بالقبول  وسيصلكم اشعار اخر حول القبول النهائي أو الرفض. ' ;
        send_email($msg,$user);
        return $msg;
    }elseif ($key == 3){
        $msg = 'عزيزي / تي ' . $user->name . ' نشعركم بأنه تم تقييم طلبكم مبدئيأ وهو بحاجة لتعديل ' . ' يرجى الدخول عبر البوابة ثم الدخول على نموذج الطلب والضغط على خانة التعديل واكمال النواقص.';
        send_email($msg,$user);
        return $msg;
    }elseif ($key == 4){
        if ($key2 == 1){
            $msg = 'عزيزي / تي ' . $user->name . ' نشعركم بأنه تم تقييم طلبكم (مرفوض)  حسب لجنة التقييم ويمكنكم معاينة الأسباب عبر الدخول لبوابة الموقع ومعاية السبب في لوحة العميل ';
            send_email($msg,$user);
            return $msg;
        }else{
            $msg = 'عزيزي / تي ' . $user->name . ' نشعركم بأنه تم رفض طلبكم  ...في حال وجود أي استفسار يمكنكم التواصل عن طريق لوحة العميل .... ';
            send_email($msg,$user);
            return $msg;
        }
    }elseif ($key == 5){
        $msg = 'عزيزي / تي  '  . $user->name . ' نشعركم بأنه تم قبول طلبكم  وسنتواصل معكم قريبا... ';
        send_email($msg,$user);
        return $msg;
    }
}
