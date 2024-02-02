<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ContestsResource;
use App\Models\Category;
use App\Models\Contest;
use App\Models\Season;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContestController extends Controller
{

    public function index()
    {
        $auth = Auth::user();
        if (!$auth->can('show_contest')) {
            abort(403, 'هذا الإجراء غير مصرح به.');
        }
        $categories = Category::query()->active()->get();
        $seasons = Season::query()->active()->get();
        return view('panel.contests.index', compact('categories','seasons'));
    }

    public function datatable(Request $request)
    {
        $resource = ContestsResource::class;
        $items = Contest::query()
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
//        dd($request->all());
        $auth = Auth::user();
        if (!$auth->can('create_contest')) {
            abort(403, 'هذا الإجراء غير مصرح به.');
        }
        $validator = Validator::make($request->all(), [
            'season_id' => 'required',
            'category_id' => 'required',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()->first(),]);
        }

        $dateParts = explode(" - ", $request->date);

        // Assign the start and end dates to your event object
        $start_date = $dateParts[0];
        $end_date = $dateParts[1];

        Contest::create([
            'category_id' => $request->category_id,
            'season_id' => $request->season_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'user_id' => Auth::user()->id,
        ]);

        return response()->json(['status' => true, 'message' => trans('operation success'),]);
    }

    public function show(Contest $contest)
    {
        //
    }

    public function edit(Contest $contest)
    {
        return response()->json(['status' => true, 'data' => $contest]);
    }

    public function update(Request $request, Contest $contest)
    {
        $auth = Auth::user();
        if (!$auth->can('edit_contest')) {
            abort(403, 'هذا الإجراء غير مصرح به.');
        }
        $validator = Validator::make($request->all(), [
            'category_id_update' => 'required',
            'season_id_update' => 'required',
            'date_update' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()->first(),]);
        }
        $dateParts = explode(" - ", $request->date_update);

        $start_date = $dateParts[0];
        $end_date = $dateParts[1];

        $contest->category_id = $request->category_id_update;
        $contest->season_id = $request->season_id_update;
        $contest->start_date = $start_date;
        $contest->end_date = $end_date;
        $contest->save();
        return response()->json(['status' => true, 'message' => trans('operation success'),]);

    }

    public function disable(Request $request, $id)
    {

        $auth = Auth::user();
        if (!$auth->can('change_status_contest')) {
            abort(402, 'هذا الإجراء غير مصرح به.');
        }
        $contest = Contest::query()->find($id);
        if ($contest) {
            $contest->status = !$contest->status;
            $contest->save();
        }
        return response()->json(['status' => true, 'message' => trans('operation success'),]);
    }

    public function destroy($id)
    {
        $auth = Auth::user();
        if (!$auth->can('change_status_contest')) {
            abort(403, 'هذا الإجراء غير مصرح به.');
        }
        $contest = Contest::query()->find($id);
        $contest->orders()->delete();
        $contest->delete();
        return response()->json(['status' => true, 'message' => trans('operation success'),]);
    }
}
