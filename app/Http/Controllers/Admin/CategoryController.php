<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\Facades\DataTable;


class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $categories =  Category::get();

        if ($request->ajax()) {
            $data = Category::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="#" link="'.route('category.update', [$row->id]).'" class="btn btn-sm edit border-0" rel="tooltip" title="Edit" id="edit"

                                data-id="' . $row->id . '" data-bs-toggle="modal"
                                data-bs-target="#edit_modal" data-bs-whatever="@mdo">
                                <i class="fas fa-pencil-alt"></i> </a>

                                <a link="' . route('category.destroy', [$row->id]) . '" data-id="' . $row->id . '" class="btn btn-danger btn-sm shadow border-0" id="delete">
                                 <i class="fas fa-trash"></i> </a>
                                 ';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('content.category.category', compact('categories'));
        //dd($request->all());
    }



    public function edit($id)
    {
        $data =  Category::where('id', $id)->first();
        return Response()->json($data);
    }
    public function view($id)
    {
        $data =  Category::where('id', $id)->first();
        return Response()->json($data);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $category = new Category();
        $category->category_name = $request->name;
        $category->slug = str_slug($request->name);
        $category->category_image = 'default.png';
        $result = $category->save();

        $id = DB::getPdo()->lastInsertId();

        if ($result) {
            $arr = 'Data Inserted.';
        } else {
            $arr = 'Something went wrong. Please try again!';
        }
        return Response()->json([
            'arr' => $arr,
            'category_name' => $request->name,
            'id' => $id,
        ]);
    }



    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $category = Category::find($id);
        $category->category_name = $request->name;
        $category->slug = str_slug($request->name);
        $category->category_image = 'default.png';
        $updated = $category->save();

        if ($updated) {
            $array = 'Data updated.';
        } else {
            $array = 'Something went wrong. Data not updated';
        }
        return Response()->json([
            'arr' => $array,
            'category_name' => $request->name,
            'id' => $id,
        ]);
    }



    public function destroy($id)
    {
        $result = Category::find($id)->delete();
        if ($result) {
            $array = 'Data deleted.';
        } else {
            $array = 'Something went wrong. Please try again!';
        }
        return Response()->json($array);
    }
}
