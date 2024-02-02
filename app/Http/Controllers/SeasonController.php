<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\SeasonsResource;
use App\Models\Category;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SeasonController extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        if (!$auth->can('show_seasons')) {
            abort(403, 'هذا الإجراء غير مصرح به.');
        }
        return view('panel.seasons.index');
    }

    public function datatable(Request $request)
    {
        $resource = SeasonsResource::class;
        $items = Season::query()
            ->search($request)
            ->orderBy('id', 'desc');

        return filterDataTable($items, $request, null, $resource);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $auth = Auth::user();
        if (!$auth->can('create_seasons')) {
            abort(403, 'هذا الإجراء غير مصرح به.');
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors(),]);
        }

        Season::create([
            'name' => $request->name,
            'status' => 1,
        ]);
        return response()->json(['status' => true, 'message' => trans('operation success'),]);
    }

    public function show(Season $season)
    {
        //
    }

    public function edit(Season $season)
    {
        $auth = Auth::user();
        if (!$auth->can('edit_seasons')) {
            abort(403, 'هذا الإجراء غير مصرح به.');
        }
        return response()->json(['status' => true, 'data' =>$season->name]);
    }

    public function update(Request $request, Season $season)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors(),]);
        }
        $season->name = $request->name;
        $season->save();
        return response()->json(['status' => true, 'message' => trans('operation success'),]);

    }

    public function disable(Request $request,$id)
    {
        $auth = Auth::user();
        if (!$auth->can('change_status_seasons')) {
            abort(403, 'هذا الإجراء غير مصرح به.');
        }
        $season = Season::query()->find($id);
        if ($season) {
            $season->status = !$season->status;
            $season->save();
        }
        return response()->json(['status' => true, 'message' => trans('operation success'),]);
    }

    public function destroy($id)
    {
        $auth = Auth::user();
        if (!$auth->can('delete_seasons')) {
            abort(403, 'هذا الإجراء غير مصرح به.');
        }
        $season = Season::query()->find($id);
//        if ($category->laws->isNotEmpty()) {
//            return response()->json(['status' => false, 'message' => translate('The category cannot be deleted because it is used in other laws')]);
//        }else{
        $season->delete();
        return response()->json(['status' => true, 'message' => trans('operation success'),]);
//        }

    }
}
