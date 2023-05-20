<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class SubCategoryController extends Controller
{

    public function index(Request $request)
    {
        //dd($request->all());
        $categories =  Category::get();


        if ($request->ajax()) {
            $data =  SubCategory::leftJoin('categories', 'sub_categories.category_id', 'categories.id')->select('sub_categories.*', 'categories.category_name')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionbtn = '<a href="#" link="' . route('subcategory.update', [$row->id]) . '" class="btn btn-info btn-sm edit text-light border-0" rel="tooltip" title="Edit"
                                data-id="' . $row->id . '" data-bs-toggle="modal"
                                data-bs-target="#edit_modal" data-bs-whatever="@mdo" id="edit">
                                <i class="fas fa-pencil-alt"></i> </a>

                               <a href="" class="btn btn-primary btn-sm text-light view border-0 d-none" id="view" rel="tooltip" title="view"
                                data-id="' . $row->id . '" data-bs-toggle="modal"
                                data-bs-target="#viewModal"> <i class="fas fa-eye"></i> </a>


                                <a link="' . route('subcategory.destroy', [$row->id]) . '" data-id="' . $row->id . '" class="btn btn-danger btn-sm shadow border-0" id="delete">
                                 <i class="fas fa-trash"></i> </a>
                                 ';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('content.subcategory.subcategory', compact('categories'));
        //dd($request->all());
    }


    public function edit($id)
    {
        $data = SubCategory::leftJoin('categories', 'sub_categories.category_id', 'categories.id')->select('sub_categories.*', 'categories.category_name')->where('sub_categories.id', $id)->first();
        return Response()->json($data);
    }


    public function view($id)
    {
        $data = SubCategory::leftJoin('categories', 'sub_categories.category_id', 'categories.id')->select('sub_categories.*', 'categories.category_name')->where('sub_categories.id', $id)->first();
        return Response()->json($data);
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'sub_category_name' => 'required',
        ]);


        $sub_category_slug = str_slug($request->sub_category_name);
        $sub_category_image = $request->file('sub_category_image');

        if (isset($sub_category_image)) {
            $currentDate = Carbon::now()->toDateString();
            $sub_category_image_name = $sub_category_slug . '-' . $currentDate . '-'. str_random(4). '.' . $sub_category_image->getClientOriginalExtension();
            if (!file_exists('uploads/sub_category_image')) {
                mkdir('uploads/sub_category_image', 077, true);
            }
            $sub_category_image->move('uploads/sub_category_image', $sub_category_image_name);
        } else {
            $sub_category_image_name = 'default.png';
        }

        $sub_category = new SubCategory();
        $sub_category->category_id = $request->category_id;
        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->sub_category_slug = $sub_category_slug;
        $sub_category->sub_category_image = $sub_category_image_name;
        $result = $sub_category->save();

        if ($result) {
            $arr = 'Data Inserted.';
        } else {
            $arr = 'Something went wrong. Please try again!';
        }
        return Response()->json([
            'arr' => $arr,
            'id' => $request->category_id,
            'category_id' => $request->category_id,
            'sub_category_name' => $request->sub_category_name,
            'sub_category_image' => '<img src="uploads/sub_category_image/'.$sub_category_image_name.'" height="50px">',
        ]);
    }



    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sub_category_name' => 'required',
        ]);

        $sub_categories = SubCategory::find($id);

        $category_id = $request->category_id;
        $sub_category_slug = str_slug($request->sub_category_name);
        $sub_category_name = $request->sub_category_name;

        $sub_category_image = $request->file('sub_category_image');

        if (isset($sub_category_image)) {
            $currentDate = Carbon::now()->toDateString();
            $sub_category_image_name = $sub_category_slug . '-' . $currentDate . '-'.str_random(4). '.' . $sub_category_image->getClientOriginalExtension();
            if (!file_exists('uploads/sub_category_image')) {
                mkdir('uploads/sub_category_image', 077, true);
            }
            $sub_category_image->move('uploads/sub_category_image', $sub_category_image_name);
        } else {
            if (isset($sub_categories->sub_category_image)) {
                $sub_category_image_name = $sub_categories->sub_category_image;
            } else {
                $sub_category_image_name = 'default.png';
            }
        }

        $sub_category = SubCategory::find($id);
        $sub_category->category_id = $request->category_id;
        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->sub_category_slug = $sub_category_slug;
        $sub_category->sub_category_image = $sub_category_image_name;
        $updated = $sub_category->save();


        if ($updated) {
            $arr = 'Data updated.';
        } else {
            $arr = 'Something went wrong. Please try again!';
        }
        return Response()->json([
            'arr' => $arr,
            'id' => $request->category_id,
            'category_id' => $request->category_id,
            'sub_category_name' => $request->sub_category_name,
            'sub_category_image' =>  '<img src="uploads/sub_category_image/'.$sub_category_image_name.'" height="50px">',
        ]);
    }



    public function destroy($id)
    {

        $result = SubCategory::find($id)->first();
        if ($result == true) {
            if (file_exists('uploads/sub_category_image/' . $result->sub_category_image)) {
                unlink('uploads/sub_category_image/' . $result->sub_category_image);
            }
            $result->delete();
            if ($result) {
                $arr = 'Data deleted.';
            } else {
                $arr = 'Something went wrong. Please try again!';
            }
        }

        return Response()->json($arr);
    }
}
