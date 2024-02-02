<?php

namespace App\Http\Controllers;

use App\Constants\ENUM;
use App\Http\Resources\ContestsResource;
use App\Http\Resources\OrdersAllResource;
use App\Http\Resources\OrdersResource;
use App\Models\Category;
use App\Models\Contest;
use App\Models\Order;
use App\Models\Branch\BranchOne;
use App\Models\Branch\CritreBranchOne;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Traits\UploadFileTrait;

class OrderController extends Controller
{
    use UploadFileTrait;

    public function GetOrderCat1()
     {
        $contestId = Cache::get('contest');
        return view('panel.orders.categorie.categorie_1', ['contestId' =>$contestId]);
     }
     public function GetOrderCat2()
     {
         $contestId = Cache::get('contest');
        return view('panel.orders.categorie.categorie_2', ['contestId' =>$contestId]);
     }
     public function GetOrderCat3()
     {
         $contestId = Cache::get('contest');
        return view('panel.orders.categorie.categorie_3', ['contestId' =>$contestId]);
     }
     public function GetOrderCat4()
     {
          $contestId = Cache::get('contest');
        return view('panel.orders.categorie.categorie_4', ['contestId' =>$contestId]);
     }
     public function GetOrderCat5()
     {
        $contestId = Cache::get('contest');
        return view('panel.orders.categorie.categorie_5', ['contestId' =>$contestId]);
     }



     public function createNewOrderCat(Request $request)
     {
         $auth = Auth::user();
         $orders = $auth->orders;
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
            if ($orders->isNotEmpty()) {
                if ($orders->last()->status == 4 || $orders->last()->status == 5) {
                    if ($auth->userType == 'user') {
                        $contest = Contest::find($request->id);
                        $season = $contest->season->id;
                        if (Order::userHasOrderInSameSeason($auth->id, $contest->id, $season)->exists()) {
                            return response()->json(['error' =>'لا يمكنك تقديم طلب في نفس الموسم'], 402);
                        } else {
                            if ($contest->status == 1) {
                                Cache::forget('contest');
                                Cache::set('contest', $request->id);
                                return response()->json(true);
                            } else {
                                return response()->json(['error' =>'المسابقه غير فعاله ولا يمكن تقديم طلبات'], 402);
                            }
                        }

                    } else {
                        return response()->json(['error' =>'لا يمكنك تقديم طلب. لا تمتلك صلاحيه'], 402);

                    }
                }

                return response()->json(['error' => 'يوجد طلبات سابقه لم تقييم'], 402);
            } else {
                $contest = Contest::query()->find($request->id);
                if ($contest->status == 1) {
                    Cache::forget('contest');
                    Cache::set('contest', $request->id);
                    Cache::forget('contest');
                    Cache::set('contest', $request->id);
                    return response()->json(true);
                } else {

                    return response()->json(['error' =>'المسابقه غير فعاله ولا يمكن تقديم طلبات'], 402);
                }
            }
        } else {
            return response()->json(['error' =>'الملف الشخصي غير مكتمل'], 402);
         }
     }


    public function createOrderCat1(Request $request){

        // INFO

        $Cat1_Info = json_decode($request->Cat1_Info, true);
        $order = Order::create([
            'contest_id' => $Cat1_Info[0]['contestId'],
           // 'category_id' => 1,
            'user_id' => Auth::user()->id,
            'fromـnomination' => $Cat1_Info[0]['w_first_name'] ." ". $Cat1_Info[0]['w_familiy_name'],
            'project_title' => 'فرع الأعلامي المتميز ',
            'description' => "",
        ]);
        $BranchOne = BranchOne::create([
            'order_id' => $order->id,
            'w_first_name' => $Cat1_Info[0]['w_first_name'],
            'w_familiy_name' =>$Cat1_Info[0]['w_familiy_name'],
            'w_adress_parti' => $Cat1_Info[0]['w_adress_parti'],
            'w_grand_pere' => $Cat1_Info[0]['w_grand_pere'],
            'w_identity' => $Cat1_Info[0]['w_identity'],
            'w_name_jobs' => $Cat1_Info[0]['w_name_jobs'],
            'w_niveau_etude' => $Cat1_Info[0]['w_niveau_etude'],
            'w_note_parti' => $Cat1_Info[0]['w_note_parti'],
            'w_pere' => $Cat1_Info[0]['w_pere'],
            'w_sexe' => $Cat1_Info[0]['w_sexe'],
            'w_spacialite' => $Cat1_Info[0]['w_spacialite'],
        ]);

        // CATEGORIE 1

        $Cat1_Tab1_count = (int)$request->Cat1_Tab1_count;

        for ($i=1; $i <=$Cat1_Tab1_count ; $i++) {

            if ($request->hasFile("Cat1_Tab1_File_$i")) {
                $FileImage = $this->UplodeFile($request->file("Cat1_Tab1_File_$i"), 'storages/categorie/1/');
            }else{
                $FileImage= [
                    'Filepath' => "",
                    'FileExtension' => "",
                    'FileTitle' => ""
                ];
            }
             $object = json_decode($request->input("Cat1_Tab1_Info_$i"), true);

             $CritreBranchOne = CritreBranchOne::create([
                'branch_one_id' => $BranchOne->id,
                'name' => "Cat1_Tab1",
                'indice' =>$object["Cat1_Tab1_Point_$i"],
                'justif' => $object["Cat1_Tab1_Cahid_$i"],
                'file_path' => $FileImage['Filepath'],
                'file_ext' => $FileImage['FileExtension'],
                'file_title' => $FileImage['FileTitle'],
            ]);
        }

        // CATEGORIE 2

        $Cat1_Tab2_count = (int)$request->Cat1_Tab2_count;

        for ($i=1; $i <=$Cat1_Tab2_count ; $i++) {

            if ($request->hasFile("Cat1_Tab2_File_$i")) {
                $FileImage = $this->UplodeFile($request->file("Cat1_Tab2_File_$i"), 'storages/categorie/1/');
            }else{
                $FileImage= [
                    'Filepath' => "",
                    'FileExtension' => "",
                    'FileTitle' => ""
                ];
            }
             $object = json_decode($request->input("Cat1_Tab2_Info_$i"), true);

             $CritreBranchOne = CritreBranchOne::create([
                'branch_one_id' => $BranchOne->id,
                'name' => "Cat1_Tab2",
                'indice' =>$object["Cat1_Tab2_Point_$i"],
                'justif' => $object["Cat1_Tab2_Cahid_$i"],
                'file_path' => $FileImage['Filepath'],
                'file_ext' => $FileImage['FileExtension'],
                'file_title' => $FileImage['FileTitle'],
            ]);
        }

        // CATEGORIE 3

        $Cat1_Tab3_count = (int)$request->Cat1_Tab3_count;

        for ($i=1; $i <=$Cat1_Tab3_count ; $i++) {

            if ($request->hasFile("Cat1_Tab3_File_$i")) {
                $FileImage = $this->UplodeFile($request->file("Cat1_Tab3_File_$i"), 'storages/categorie/1/');
            }else{
                $FileImage= [
                    'Filepath' => "",
                    'FileExtension' => "",
                    'FileTitle' => ""
                ];
            }
             $object = json_decode($request->input("Cat1_Tab3_Info_$i"), true);

             $CritreBranchOne = CritreBranchOne::create([
                'branch_one_id' => $BranchOne->id,
                'name' => "Cat1_Tab3",
                'indice' =>$object["Cat1_Tab3_Point_$i"],
                'justif' => $object["Cat1_Tab3_Cahid_$i"],
                'file_path' => $FileImage['Filepath'],
                'file_ext' => $FileImage['FileExtension'],
                'file_title' => $FileImage['FileTitle'],
            ]);
        }

        // CATEGORIE 4

        $Cat1_Tab4_count = (int)$request->Cat1_Tab4_count;

        for ($i=1; $i <=$Cat1_Tab4_count ; $i++) {

            if ($request->hasFile("Cat1_Tab4_File_$i")) {
                $FileImage = $this->UplodeFile($request->file("Cat1_Tab4_File_$i"), 'storages/categorie/1/');
            }else{
                $FileImage= [
                    'Filepath' => "",
                    'FileExtension' => "",
                    'FileTitle' => ""
                ];
            }
             $object = json_decode($request->input("Cat1_Tab4_Info_$i"), true);

             $CritreBranchOne = CritreBranchOne::create([
                'branch_one_id' => $BranchOne->id,
                'name' => "Cat1_Tab4",
                'indice' =>$object["Cat1_Tab4_Point_$i"],
                'justif' => $object["Cat1_Tab4_Cahid_$i"],
                'file_path' => $FileImage['Filepath'],
                'file_ext' => $FileImage['FileExtension'],
                'file_title' => $FileImage['FileTitle'],
            ]);
        }

        // CATEGORIE 5

        $Cat1_Tab5_count = (int)$request->Cat1_Tab5_count;

        for ($i=1; $i <=$Cat1_Tab5_count ; $i++) {

            if ($request->hasFile("Cat1_Tab5_File_$i")) {
                $FileImage = $this->UplodeFile($request->file("Cat1_Tab5_File_$i"), 'storages/categorie/1/');
            }else{
                $FileImage= [
                    'Filepath' => "",
                    'FileExtension' => "",
                    'FileTitle' => ""
                ];
            }
             $object = json_decode($request->input("Cat1_Tab5_Info_$i"), true);

             $CritreBranchOne = CritreBranchOne::create([
                'branch_one_id' => $BranchOne->id,
                'name' => "Cat1_Tab5",
                'indice' =>$object["Cat1_Tab5_Point_$i"],
                'justif' => $object["Cat1_Tab5_Cahid_$i"],
                'file_path' => $FileImage['Filepath'],
                'file_ext' => $FileImage['FileExtension'],
                'file_title' => $FileImage['FileTitle'],
            ]);
        }

        // CATEGORIE 6

        $Cat1_Tab6_count = (int)$request->Cat1_Tab6_count;

        for ($i=1; $i <=$Cat1_Tab6_count ; $i++) {

            if ($request->hasFile("Cat1_Tab6_File_$i")) {
                $FileImage = $this->UplodeFile($request->file("Cat1_Tab6_File_$i"), 'storages/categorie/1/');
            }else{
                $FileImage= [
                    'Filepath' => "",
                    'FileExtension' => "",
                    'FileTitle' => ""
                ];
            }
             $object = json_decode($request->input("Cat1_Tab6_Info_$i"), true);

             $CritreBranchOne = CritreBranchOne::create([
                'branch_one_id' => $BranchOne->id,
                'name' => "Cat1_Tab6",
                'indice' =>$object["Cat1_Tab6_Point_$i"],
                'justif' => $object["Cat1_Tab6_Cahid_$i"],
                'file_path' => $FileImage['Filepath'],
                'file_ext' => $FileImage['FileExtension'],
                'file_title' => $FileImage['FileTitle'],
            ]);
        }

        // CATEGORIE 7

        $Cat1_Tab7_count = (int)$request->Cat1_Tab7_count;

        for ($i=1; $i <=$Cat1_Tab7_count ; $i++) {

            if ($request->hasFile("Cat1_Tab7_File_$i")) {
                $FileImage = $this->UplodeFile($request->file("Cat1_Tab7_File_$i"), 'storages/categorie/1/');
            }else{
                $FileImage= [
                    'Filepath' => "",
                    'FileExtension' => "",
                    'FileTitle' => ""
                ];
            }
             $object = json_decode($request->input("Cat1_Tab7_Info_$i"), true);

             $CritreBranchOne = CritreBranchOne::create([
                'branch_one_id' => $BranchOne->id,
                'name' => "Cat1_Tab7",
                'indice' =>$object["Cat1_Tab7_Point_$i"],
                'justif' => $object["Cat1_Tab7_Cahid_$i"],
                'file_path' => $FileImage['Filepath'],
                'file_ext' => $FileImage['FileExtension'],
                'file_title' => $FileImage['FileTitle'],
            ]);
        }

        // CATEGORIE 8

        $Cat1_Tab8_count = (int)$request->Cat1_Tab8_count;

        for ($i=1; $i <=$Cat1_Tab8_count ; $i++) {

            if ($request->hasFile("Cat1_Tab8_File_$i")) {
                $FileImage = $this->UplodeFile($request->file("Cat1_Tab8_File_$i"), 'storages/categorie/1/');
            }else{
                $FileImage= [
                    'Filepath' => "",
                    'FileExtension' => "",
                    'FileTitle' => ""
                ];
            }
             $object = json_decode($request->input("Cat1_Tab8_Info_$i"), true);

             $CritreBranchOne = CritreBranchOne::create([
                'branch_one_id' => $BranchOne->id,
                'name' => "Cat1_Tab8",
                'indice' =>$object["Cat1_Tab8_Point_$i"],
                'justif' => $object["Cat1_Tab8_Cahid_$i"],
                'file_path' => $FileImage['Filepath'],
                'file_ext' => $FileImage['FileExtension'],
                'file_title' => $FileImage['FileTitle'],
            ]);
        }

         return response()->json(['status' =>true]);

    }
    public function createOrderCat2(Request $request){

       // return $request->all();

        // INFO

        $Cat2_Info = json_decode($request->Cat2_Info, true);
        $order = Order::create([
            'contest_id' => $Cat2_Info[0]['contestId'],
           // 'category_id' => 1,
            'user_id' => Auth::user()->id,
            'fromـnomination' => $Cat2_Info[0]['w_first_name'] ." ". $Cat2_Info[0]['w_familiy_name'],
            'project_title' => 'فرع أبناء المنطقة المتميزين خارجها',
            'description' => "",
        ]);
        $BranchOne = BranchOne::create([
            'order_id' => $order->id,
            'w_first_name' => $Cat2_Info[0]['w_first_name'],
            'w_familiy_name' =>$Cat2_Info[0]['w_familiy_name'],
            'w_adress_parti' => $Cat2_Info[0]['w_adress_parti'],
            'w_grand_pere' => $Cat2_Info[0]['w_grand_pere'],
            'w_identity' => $Cat2_Info[0]['w_identity'],
            'w_name_jobs' => $Cat2_Info[0]['w_name_jobs'],
            'w_niveau_etude' => $Cat2_Info[0]['w_niveau_etude'],
            'w_note_parti' => $Cat2_Info[0]['w_note_parti'],
            'w_pere' => $Cat2_Info[0]['w_pere'],
            'w_sexe' => $Cat2_Info[0]['w_sexe'],
            'w_spacialite' => $Cat2_Info[0]['w_spacialite'],
        ]);

        // CATEGORIE 1

        $Cat2_Tab1_count = (int)$request->Cat2_Tab1_count;

        for ($i=1; $i <=$Cat2_Tab1_count ; $i++) {

            if ($request->hasFile("Cat2_Tab1_File_$i")) {
                $FileImage = $this->UplodeFile($request->file("Cat2_Tab1_File_$i"), 'storages/categorie/2/');
            }else{
                $FileImage= [
                    'Filepath' => "",
                    'FileExtension' => "",
                    'FileTitle' => ""
                ];
            }
             $object = json_decode($request->input("Cat2_Tab1_Info_$i"), true);

             $CritreBranchOne = CritreBranchOne::create([
                'branch_one_id' => $BranchOne->id,
                'name' => "Cat2_Tab1",
                'indice' =>$object["Cat2_Tab1_Point_$i"],
                'justif' => $object["Cat2_Tab1_Cahid_$i"],
                'file_path' => $FileImage['Filepath'],
                'file_ext' => $FileImage['FileExtension'],
                'file_title' => $FileImage['FileTitle'],
            ]);
        }

        // CATEGORIE 2

        $Cat2_Tab2_count = (int)$request->Cat2_Tab2_count;

        for ($i=1; $i <=$Cat2_Tab2_count ; $i++) {

            if ($request->hasFile("Cat2_Tab2_File_$i")) {
                $FileImage = $this->UplodeFile($request->file("Cat2_Tab2_File_$i"), 'storages/categorie/2/');
            }else{
                $FileImage= [
                    'Filepath' => "",
                    'FileExtension' => "",
                    'FileTitle' => ""
                ];
            }
             $object = json_decode($request->input("Cat2_Tab2_Info_$i"), true);

             $CritreBranchOne = CritreBranchOne::create([
                'branch_one_id' => $BranchOne->id,
                'name' => "Cat2_Tab2",
                'indice' =>$object["Cat2_Tab2_Point_$i"],
                'justif' => $object["Cat2_Tab2_Cahid_$i"],
                'file_path' => $FileImage['Filepath'],
                'file_ext' => $FileImage['FileExtension'],
                'file_title' => $FileImage['FileTitle'],
            ]);
        }

        // CATEGORIE 3

        $Cat2_Tab3_count = (int)$request->Cat2_Tab3_count;

        for ($i=1; $i <=$Cat2_Tab3_count ; $i++) {

            if ($request->hasFile("Cat2_Tab3_File_$i")) {
                $FileImage = $this->UplodeFile($request->file("Cat2_Tab3_File_$i"), 'storages/categorie/2/');
            }else{
                $FileImage= [
                    'Filepath' => "",
                    'FileExtension' => "",
                    'FileTitle' => ""
                ];
            }
             $object = json_decode($request->input("Cat2_Tab3_Info_$i"), true);

             $CritreBranchOne = CritreBranchOne::create([
                'branch_one_id' => $BranchOne->id,
                'name' => "Cat2_Tab3",
                'indice' =>$object["Cat2_Tab3_Point_$i"],
                'justif' => $object["Cat2_Tab3_Cahid_$i"],
                'file_path' => $FileImage['Filepath'],
                'file_ext' => $FileImage['FileExtension'],
                'file_title' => $FileImage['FileTitle'],
            ]);
        }

        // CATEGORIE 4

        $Cat2_Tab4_count = (int)$request->Cat2_Tab4_count;

        for ($i=1; $i <=$Cat2_Tab4_count ; $i++) {

            if ($request->hasFile("Cat2_Tab4_File_$i")) {
                $FileImage = $this->UplodeFile($request->file("Cat2_Tab4_File_$i"), 'storages/categorie/2/');
            }else{
                $FileImage= [
                    'Filepath' => "",
                    'FileExtension' => "",
                    'FileTitle' => ""
                ];
            }
             $object = json_decode($request->input("Cat2_Tab4_Info_$i"), true);

             $CritreBranchOne = CritreBranchOne::create([
                'branch_one_id' => $BranchOne->id,
                'name' => "Cat2_Tab4",
                'indice' =>$object["Cat2_Tab4_Point_$i"],
                'justif' => $object["Cat2_Tab4_Cahid_$i"],
                'file_path' => $FileImage['Filepath'],
                'file_ext' => $FileImage['FileExtension'],
                'file_title' => $FileImage['FileTitle'],
            ]);
        }


         return response()->json(['status' =>true]);

    }
    public function createOrderCat3(Request $request){
         // INFO

         $Cat3_Info = json_decode($request->Cat3_Info, true);
         $order = Order::create([
             'contest_id' =>$Cat3_Info[0]['contestId'],
            // 'category_id' => 1,
             'user_id' => Auth::user()->id,
             'fromـnomination' => $Cat3_Info[0]['w_first_name'] ." ". $Cat3_Info[0]['w_familiy_name'],
             'project_title' => 'فرع القرآن الكريم والسنة النبوية',
             'description' => "",
         ]);
         $BranchOne = BranchOne::create([
             'order_id' => $order->id,
             'w_first_name' => $Cat3_Info[0]['w_first_name'],
             'w_familiy_name' =>$Cat3_Info[0]['w_familiy_name'],
             'w_adress_parti' => $Cat3_Info[0]['w_adress_parti'],
             'w_grand_pere' => $Cat3_Info[0]['w_grand_pere'],
             'w_identity' => $Cat3_Info[0]['w_identity'],
             'w_name_jobs' => $Cat3_Info[0]['w_name_jobs'],
             'w_niveau_etude' => $Cat3_Info[0]['w_niveau_etude'],
             'w_note_parti' => $Cat3_Info[0]['w_note_parti'],
             'w_pere' => $Cat3_Info[0]['w_pere'],
             'w_sexe' => $Cat3_Info[0]['w_sexe'],
             'w_spacialite' => $Cat3_Info[0]['w_spacialite'],
             'Type_Cat_3' => $request->Cat3_Type,
         ]);

         if ($request->Cat3_Type == "qoran") {
            // CATEGORIE 1

            $Cat3_Tab1_count = (int)$request->Cat3_Tab1_count;

            for ($i=1; $i <=$Cat3_Tab1_count ; $i++) {

                if ($request->hasFile("Cat3_Tab1_File_$i")) {
                    $FileImage = $this->UplodeFile($request->file("Cat3_Tab1_File_$i"), 'storages/categorie/3/');
                }else{
                    $FileImage= [
                        'Filepath' => "",
                        'FileExtension' => "",
                        'FileTitle' => ""
                    ];
                }
                $object = json_decode($request->input("Cat3_Tab1_Info_$i"), true);

                $CritreBranchOne = CritreBranchOne::create([
                    'branch_one_id' => $BranchOne->id,
                    'name' => "Cat3_Tab1",
                    'indice' =>$object["Cat3_Tab1_Point_$i"],
                    'justif' => $object["Cat3_Tab1_Cahid_$i"],
                    'file_path' => $FileImage['Filepath'],
                    'file_ext' => $FileImage['FileExtension'],
                    'file_title' => $FileImage['FileTitle'],
                ]);
            }
         } else {

            // CATEGORIE 2

            $Cat3_Tab2_count = (int)$request->Cat3_Tab2_count;

            for ($i=1; $i <=$Cat3_Tab2_count ; $i++) {

                if ($request->hasFile("Cat3_Tab2_File_$i")) {
                    $FileImage = $this->UplodeFile($request->file("Cat3_Tab2_File_$i"), 'storages/categorie/3/');
                }else{
                    $FileImage= [
                        'Filepath' => "",
                        'FileExtension' => "",
                        'FileTitle' => ""
                    ];
                }
                $object = json_decode($request->input("Cat3_Tab2_Info_$i"), true);

                $CritreBranchOne = CritreBranchOne::create([
                    'branch_one_id' => $BranchOne->id,
                    'name' => "Cat3_Tab2",
                    'indice' =>$object["Cat3_Tab2_Point_$i"],
                    'justif' => $object["Cat3_Tab2_Cahid_$i"],
                    'file_path' => $FileImage['Filepath'],
                    'file_ext' => $FileImage['FileExtension'],
                    'file_title' => $FileImage['FileTitle'],
                ]);
            }

         }


          return response()->json(['status' =>true]);

    }
    public function createOrderCat4(Request $request){


        // INFO

        $Cat4_Info = json_decode($request->Cat4_Info, true);
        $order = Order::create([
            'contest_id' => $Cat4_Info[0]['contestId'],
           // 'category_id' => 1,
            'user_id' => Auth::user()->id,
            'fromـnomination' => $Cat4_Info[0]['w_first_name'] ." ". $Cat4_Info[0]['w_familiy_name'],
            'project_title' => 'فرع الأبداع في الشعر العربي',
            'description' => "",
        ]);
        $BranchOne = BranchOne::create([
            'order_id' => $order->id,
            'w_first_name' => $Cat4_Info[0]['w_first_name'],
            'w_familiy_name' =>$Cat4_Info[0]['w_familiy_name'],
            'w_adress_parti' => $Cat4_Info[0]['w_adress_parti'],
            'w_grand_pere' => $Cat4_Info[0]['w_grand_pere'],
            'w_identity' => $Cat4_Info[0]['w_identity'],
            'w_name_jobs' => $Cat4_Info[0]['w_name_jobs'],
            'w_niveau_etude' => $Cat4_Info[0]['w_niveau_etude'],
            'w_note_parti' => $Cat4_Info[0]['w_note_parti'],
            'w_pere' => $Cat4_Info[0]['w_pere'],
            'w_sexe' => $Cat4_Info[0]['w_sexe'],
            'w_spacialite' => $Cat4_Info[0]['w_spacialite'],
        ]);

           // CATEGORIE 1

           $Cat4_Tab1_count = (int)$request->Cat4_Tab1_count;

           for ($i=1; $i <=$Cat4_Tab1_count ; $i++) {

               if ($request->hasFile("Cat4_Tab1_File_$i")) {
                   $FileImage = $this->UplodeFile($request->file("Cat4_Tab1_File_$i"), 'storages/categorie/4/');
               }else{
                   $FileImage= [
                       'Filepath' => "",
                       'FileExtension' => "",
                       'FileTitle' => ""
                   ];
               }
               $object = json_decode($request->input("Cat4_Tab1_Info_$i"), true);

               $CritreBranchOne = CritreBranchOne::create([
                   'branch_one_id' => $BranchOne->id,
                   'name' => "Cat4_Tab1",
                   'indice' =>$object["Cat4_Tab1_Point_$i"],
                   'justif' => $object["Cat4_Tab1_Cahid_$i"],
                   'file_path' => $FileImage['Filepath'],
                   'file_ext' => $FileImage['FileExtension'],
                   'file_title' => $FileImage['FileTitle'],
               ]);
           }


           // CATEGORIE 2

           $Cat4_Tab2_count = (int)$request->Cat4_Tab2_count;

           for ($i=1; $i <=$Cat4_Tab2_count ; $i++) {

               if ($request->hasFile("Cat4_Tab2_File_$i")) {
                   $FileImage = $this->UplodeFile($request->file("Cat4_Tab2_File_$i"), 'storages/categorie/4/');
               }else{
                   $FileImage= [
                       'Filepath' => "",
                       'FileExtension' => "",
                       'FileTitle' => ""
                   ];
               }
               $object = json_decode($request->input("Cat4_Tab2_Info_$i"), true);

               $CritreBranchOne = CritreBranchOne::create([
                   'branch_one_id' => $BranchOne->id,
                   'name' => "Cat4_Tab2",
                   'indice' =>$object["Cat4_Tab2_Point_$i"],
                   'justif' => $object["Cat4_Tab2_Cahid_$i"],
                   'file_path' => $FileImage['Filepath'],
                   'file_ext' => $FileImage['FileExtension'],
                   'file_title' => $FileImage['FileTitle'],
               ]);
           }


         return response()->json(['status' =>true]);

    }
    public function createOrderCat5(Request $request){


        // INFO

        $Cat5_Info = json_decode($request->Cat5_Info, true);
        $order = Order::create([
            'contest_id' => $Cat5_Info[0]['contestId'],
           // 'category_id' => 1,
            'user_id' => Auth::user()->id,
            'fromـnomination' => $Cat5_Info[0]['w_first_name'] ." ". $Cat5_Info[0]['w_familiy_name'],
            'project_title' => 'فرع الإبتكار وريادة الأعمال',
            'description' => "",
        ]);
        $BranchOne = BranchOne::create([
            'order_id' => $order->id,
            'w_first_name' => $Cat5_Info[0]['w_first_name'],
            'w_familiy_name' =>$Cat5_Info[0]['w_familiy_name'],
            'w_adress_parti' => $Cat5_Info[0]['w_adress_parti'],
            'w_grand_pere' => $Cat5_Info[0]['w_grand_pere'],
            'w_identity' => $Cat5_Info[0]['w_identity'],
            'w_name_jobs' => $Cat5_Info[0]['w_name_jobs'],
            'w_niveau_etude' => $Cat5_Info[0]['w_niveau_etude'],
            'w_note_parti' => $Cat5_Info[0]['w_note_parti'],
            'w_pere' => $Cat5_Info[0]['w_pere'],
            'w_sexe' => $Cat5_Info[0]['w_sexe'],
            'w_spacialite' => $Cat5_Info[0]['w_spacialite'],
            'w_cycle_cat5' => $Cat5_Info[0]['w_cycle'],
        ]);

        // CATEGORIE 1

        $Cat5_Tab1_count = (int)$request->Cat5_Tab1_count;

        for ($i=1; $i <=$Cat5_Tab1_count ; $i++) {

            if ($request->hasFile("Cat5_Tab1_File_$i")) {
                $FileImage = $this->UplodeFile($request->file("Cat5_Tab1_File_$i"), 'storages/categorie/5/');
            }else{
                $FileImage= [
                    'Filepath' => "",
                    'FileExtension' => "",
                    'FileTitle' => ""
                ];
            }
             $object = json_decode($request->input("Cat5_Tab1_Info_$i"), true);

             $CritreBranchOne = CritreBranchOne::create([
                'branch_one_id' => $BranchOne->id,
                'name' => "Cat5_Tab1",
                'indice' =>$object["Cat5_Tab1_Point_$i"],
                'justif' => $object["Cat5_Tab1_Cahid_$i"],
                'file_path' => $FileImage['Filepath'],
                'file_ext' => $FileImage['FileExtension'],
                'file_title' => $FileImage['FileTitle'],
            ]);
        }

        // CATEGORIE 2

        $Cat5_Tab2_count = (int)$request->Cat5_Tab2_count;

        for ($i=1; $i <=$Cat5_Tab2_count ; $i++) {

            if ($request->hasFile("Cat5_Tab2_File_$i")) {
                $FileImage = $this->UplodeFile($request->file("Cat5_Tab2_File_$i"), 'storages/categorie/5/');
            }else{
                $FileImage= [
                    'Filepath' => "",
                    'FileExtension' => "",
                    'FileTitle' => ""
                ];
            }
             $object = json_decode($request->input("Cat5_Tab2_Info_$i"), true);

             $CritreBranchOne = CritreBranchOne::create([
                'branch_one_id' => $BranchOne->id,
                'name' => "Cat5_Tab2",
                'indice' =>$object["Cat5_Tab2_Point_$i"],
                'justif' => $object["Cat5_Tab2_Cahid_$i"],
                'file_path' => $FileImage['Filepath'],
                'file_ext' => $FileImage['FileExtension'],
                'file_title' => $FileImage['FileTitle'],
            ]);
        }

        // CATEGORIE 3

        $Cat5_Tab3_count = (int)$request->Cat5_Tab3_count;

        for ($i=1; $i <=$Cat5_Tab3_count ; $i++) {

            if ($request->hasFile("Cat5_Tab3_File_$i")) {
                $FileImage = $this->UplodeFile($request->file("Cat5_Tab3_File_$i"), 'storages/categorie/5/');
            }else{
                $FileImage= [
                    'Filepath' => "",
                    'FileExtension' => "",
                    'FileTitle' => ""
                ];
            }
             $object = json_decode($request->input("Cat5_Tab3_Info_$i"), true);

             $CritreBranchOne = CritreBranchOne::create([
                'branch_one_id' => $BranchOne->id,
                'name' => "Cat5_Tab3",
                'indice' =>$object["Cat5_Tab3_Point_$i"],
                'justif' => $object["Cat5_Tab3_Cahid_$i"],
                'file_path' => $FileImage['Filepath'],
                'file_ext' => $FileImage['FileExtension'],
                'file_title' => $FileImage['FileTitle'],
            ]);
        }

        // CATEGORIE 4

        $Cat5_Tab4_count = (int)$request->Cat5_Tab4_count;

        for ($i=1; $i <=$Cat5_Tab4_count ; $i++) {

            if ($request->hasFile("Cat5_Tab4_File_$i")) {
                $FileImage = $this->UplodeFile($request->file("Cat5_Tab4_File_$i"), 'storages/categorie/4/');
            }else{
                $FileImage= [
                    'Filepath' => "",
                    'FileExtension' => "",
                    'FileTitle' => ""
                ];
            }
             $object = json_decode($request->input("Cat5_Tab4_Info_$i"), true);

             $CritreBranchOne = CritreBranchOne::create([
                'branch_one_id' => $BranchOne->id,
                'name' => "Cat5_Tab4",
                'indice' =>$object["Cat5_Tab4_Point_$i"],
                'justif' => $object["Cat5_Tab4_Cahid_$i"],
                'file_path' => $FileImage['Filepath'],
                'file_ext' => $FileImage['FileExtension'],
                'file_title' => $FileImage['FileTitle'],
            ]);
        }

        // CATEGORIE 5

        $Cat5_Tab5_count = (int)$request->Cat5_Tab5_count;

        for ($i=1; $i <=$Cat5_Tab5_count ; $i++) {

            if ($request->hasFile("Cat5_Tab5_File_$i")) {
                $FileImage = $this->UplodeFile($request->file("Cat5_Tab5_File_$i"), 'storages/categorie/5/');
            }else{
                $FileImage= [
                    'Filepath' => "",
                    'FileExtension' => "",
                    'FileTitle' => ""
                ];
            }
             $object = json_decode($request->input("Cat5_Tab5_Info_$i"), true);

             $CritreBranchOne = CritreBranchOne::create([
                'branch_one_id' => $BranchOne->id,
                'name' => "Cat5_Tab5",
                'indice' =>$object["Cat5_Tab5_Point_$i"],
                'justif' => $object["Cat5_Tab5_Cahid_$i"],
                'file_path' => $FileImage['Filepath'],
                'file_ext' => $FileImage['FileExtension'],
                'file_title' => $FileImage['FileTitle'],
            ]);
        }

         return response()->json(['status' =>true]);

    }


    public function index()
    {
        $user = Auth::user();
        if ($user->userType == 'user') {
            $contests = Contest::all();
            return view('panel.orders.index',['Contests' => $contests]);
        }
        abort(403);
    }

    public function indexAllOrders()
    {
        $category = Category::query()->get();
        return view('panel.orders.all_order', compact('category'));
    }

    public function datatable(Request $request)
    {
        $resource = OrdersResource::class;
        $items = Contest::query()
            ->search($request)
            ->orderBy('id', 'desc');

        return filterDataTable($items, $request, null, $resource);
    }

    public function datatableAllOrders(Request $request)
    {
        $auth = Auth::user();
        $resource = OrdersAllResource::class;
        if ($auth->hasRole('web') || $auth->hasRole('موظف - مقيم') || $auth->hasRole('موظف - مدير فرع')) {
            $items = Order::query()
                ->search($request)
                ->orderBy('id', 'desc');
        }


        return filterDataTable($items, $request, null, $resource);
    }

    public function createOrder(Request $request)
    {
        $auth = Auth::user();
        $orders = $auth->orders;
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
            if ($orders->isNotEmpty()) {
                if ($orders->last()->status == 4 || $orders->last()->status == 5) {
                    if ($auth->userType == 'user') {
                        $contest = Contest::query()->find($request->id);
                        $season = $contest->season->id;
                        if (Order::userHasOrderInSameSeason($auth->id, $contest->id, $season)->exists()) {
                            return response()->json('لا يمكنك تقديم طلب في نفس الموسم', 402);
                        } else {
                            if ($contest->status == 1) {
                                Cache::forget('contest');
                                Cache::set('contest', $request->id);
                                return response()->json(true);
                            } else {
                                return response()->json('المسابقه غير فعاله ولا يمكن تقديم طلبات', 402);
                            }
                        }

                    } else {
                        return response()->json('لا يمكنك تقديم طلب. لا تمتلك صلاحيه', 402);
                    }
                }
                return response()->json('يوجد طلبات سابقه لم تقييم', 402);
            } else {
                $contest = Contest::query()->find($request->id);
                if ($contest->status == 1) {
                    Cache::forget('contest');
                    Cache::set('contest', $request->id);
                    Cache::forget('contest');
                    Cache::set('contest', $request->id);
                    return response()->json(true);
                } else {
                    return response()->json('المسابقه غير فعاله ولا يمكن تقديم طلبات', 402);
                }
            }
        } else {
            return response()->json('الملف الشخصي غير مكتمل', 402);
        }

    }

    public function create()
    {
        return view('panel.orders.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
//            'category_id' => 'required|integer',
            'fromـnomination' => 'required|string',
            'project_title' => 'required|string',
            'description' => 'required|string',
            'file' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()->first()], 402);
        }

        if ($request->hasFile('file')) {
            $file = uploadFile($request, $request->file);
        }
        $order = Order::create([
            'contest_id' => Cache::get('contest'),
//            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            'fromـnomination' => $request->fromـnomination,
            'project_title' => $request->project_title,
            'description' => $request->description,
            'file' => $file,
        ]);

        $orderUser = $order->user;

        $msg = send_message(1, $orderUser, 0);

        $to = $orderUser->phone;
        if ($to) {
            sendMessageToUltraMsg($msg, $to);
        }

        return response()->json(['status' => true, 'message' => trans('operation success'),]);
    }

    public function show(Order $order)
    {
        return view('panel.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        if ($order->status == 3) {
            return view('panel.orders.edit', compact('order'));
        }
        abort(403);
    }

    public function update(Request $request, Order $order)
    {
        $validator = Validator::make($request->all(), [
//            'category_id' => 'required|integer',
            'fromـnomination' => 'required|string',
            'project_title' => 'required|string',
            'description' => 'required|string',
            'file' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()->first()], 402);
        }

        if ($request->hasFile('file')) {
            $filePath = public_path('files/' . $order->file);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            $file = uploadFile($request, $request->file);
            $order->file = $file;
        }
        $order->fromـnomination = $request->fromـnomination;
        $order->project_title = $request->project_title;
        $order->description = $request->description;
        $order->status = 1;
        $order->save();
        return response()->json(['status' => true, 'message' => trans('operation success'),]);

    }

    public function change_status_order(Request $request)
    {
//        dd($request->all());
        $auth = Auth::user();
        if (!$auth->can('change_status_orders')) {
            abort(403, 'هذا الإجراء غير مصرح به.');
        }
        $order = Order::query()->findOrFail($request->id);
        $orderUser = $order->user;
        if ($request->hasFile('file')) {
            $file = uploadFile($request, $request->file);
        }
        if ($auth->hasRole('web')) {
            if ($request->hasFile('file')) {
                $order->description_notes = $request->description_notes;
                $order->file_notes = $file;
            }
            if ($order->status == 1) {
                $msg = send_message($request->status, $orderUser, 1);
            } else {
                $msg = send_message($request->status, $orderUser, 0);
            }
            $order->status = $request->status;
            $order->user_id_2 = $auth->id;
            $order->user_id_3 = $auth->id;
            $to = $orderUser->phone;
            if ($to) {
                sendMessageToUltraMsg($msg, $to);
            }
        } elseif ($auth->hasRole('موظف - مقيم')) {
            if ($order->status == 1 || $order->status == 3) {
                if ($request->hasFile('file')) {
                    $order->description_notes = $request->description_notes;
                    $order->file_notes = $file;
                }
                if ($order->status == 1) {
                    $msg = send_message($request->status, $orderUser, 1);
                } else {
                    $msg = send_message($request->status, $orderUser, 0);
                }
                $order->status = $request->status;
                $order->user_id_2 = $auth->id;
                $to = $orderUser->phone;
                if ($to) {
                    sendMessageToUltraMsg($msg, $to);
                }
            }
        } elseif ($auth->hasRole('موظف - مدير فرع')) {
            if ($order->status == 2) {
                $order->status = $request->status;
                $order->user_id_3 = $auth->id;
                if ($order->status == 1) {
                    $msg = send_message($request->status, $orderUser, 1);
                } else {
                    $msg = send_message($request->status, $orderUser, 0);
                }
                $to = $orderUser->phone;
                if ($to) {
                    sendMessageToUltraMsg($msg, $to);
                }
            }
        }
        $order->save();
        return response()->json(['status' => true, 'message' => trans('operation success'),]);
    }

}
