<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Brand;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data =  Brand::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a link="' . route('brand.update', [$row->id]) . '" class="btn btn-info btn-sm edit text-light border-0" rel="tooltip" id="edit" title="Edit"
                                data-id="' . $row->id . '" data-bs-toggle="modal"
                                data-bs-target="#edit_modal" data-bs-whatever="@mdo">
                                <i class="fas fa-pencil-alt"></i> </a>

                                <a link="' . route('brand.destroy', [$row->id]) . '" data-id="' . $row->id . '" class="btn btn-danger btn-sm shadow border-0" id="delete">
                                 <i class="fas fa-trash"></i> </a>
                                 ';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('content.brand.brand');
        //dd($request->all());
    }


    public function edit($id)
    {
        $data = Brand::find($id);
        return Response()->json($data);
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'brand_name' => 'required',
        ]);


        $brand_slug = str_slug($request->brand_name);
        $brand_image = $request->file('brand_image');

        if (isset($brand_image)) {
            $currentDate = Carbon::now()->toDateString();
            $brand_image_name = $brand_slug . '-' . $currentDate . '-' . '.' . $brand_image->getClientOriginalExtension();
            if (!file_exists('uploads/brand_image')) {
                mkdir('uploads/brand_image', 077, true);
            }
            $brand_image->move('uploads/brand_image', $brand_image_name);
        } else {
            $brand_image_name = 'default.png';
        }

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = $brand_slug;
        $brand->brand_image = $brand_image_name;
        $result = $brand->save();
        $id = $brand->id;

        if ($result) {
            $arr = 'Data Inserted.';
        } else {
            $arr = 'Something went wrong. Please try again!';
        }
        return Response()->json([
            'arr' => $arr,
            'brand_name' => $request->brand_name,
            'brand_image' =>  '<img src="uploads/brand_image/' . $request->brand_image . '" height="50px">',
        ]);
    }



    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'brand_name' => 'required',
        ]);

        $brands = Brand::find($id);
        $brand_slug = str_slug($request->brand_name);
        $brand_image = $request->file('brand_image');

        if (isset($brand_image)) {
            $currentDate = Carbon::now()->toDateString();
            $brand_image_name = $brand_slug . '-' . $currentDate . '-' . '.' . $brand_image->getClientOriginalExtension();
            if (!file_exists('uploads/brand_image')) {
                mkdir('uploads/brand_image', 077, true);
            }
            $brand_image->move('uploads/brand_image', $brand_image_name);
        } else {
            if (isset($brands->brand_image)) {
                $brand_image_name = $brands->brand_image;
            } else {
                $brand_image_name = 'default.png';
            }
        }

        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = $brand_slug;
        $brand->brand_image = $brand_image_name;
        $updated = $brand->save();
        $id = $brand->id;

        if ($updated) {
            $arr = 'Data updated.';
        } else {
            $arr = 'Something went wrong. Please try again!';
        }
        return Response()->json([
            'arr' => $arr,
            'id' => $request->category_id,
            'brand_name' => $request->brand_name,
            'brand_image' =>  '<img src="uploads/brand_image/' . $request->brand_image . '" height="50px">',
        ]);
    }



    public function destroy($id)
    {

        $result = Brand::find($id);

        if ($result == true) {
            if (file_exists('uploads/brand_image/' . $result->brand_image)) {
                unlink('uploads/brand_image/' . $result->brand_image);
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
