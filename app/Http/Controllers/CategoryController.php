<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function index()
    {
        $laws = Category::orderBy('id', 'desc')->get();
        return view('panel.categories.index', compact('laws'));
    }

    public function datatable(Request $request)
    {
        $resource = CategoryResource::class;
        $items = Category::query()
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors(),]);
        }

        Category::create([
            'name' => $request->name,
            'status' => 1,
        ]);
        return response()->json(['status' => true, 'message' => trans('operation success'),]);
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return response()->json(['status' => true, 'data' =>$category->name]);
    }

    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors(),]);
        }
        $category->name = $request->name;
        $category->save();
        return response()->json(['status' => true, 'message' => trans('operation success'),]);

    }

    public function disable(Request $request,$id)
    {
        $category = Category::query()->find($id);
        if ($category) {
            $category->status = !$category->status;
            $category->save();
        }
        return response()->json(['status' => true, 'message' => trans('operation success'),]);
    }

    public function destroy($id)
    {
        $category = Category::query()->find($id);
//        if ($category->laws->isNotEmpty()) {
//            return response()->json(['status' => false, 'message' => translate('The category cannot be deleted because it is used in other laws')]);
//        }else{
            $category->delete();
            return response()->json(['status' => true, 'message' => trans('operation success'),]);
//        }

    }
}
