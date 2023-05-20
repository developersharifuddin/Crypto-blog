<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class ProductImageController extends Controller
{
    public function index(Request $request)
    {
        //dd($request->all());
        $products =  Product::get();


        if ($request->ajax()) {
            $data =   ProductImage::leftJoin('products', 'product_images.product_id', 'products.id')->select('product_images.*', 'products.product_name')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a link="' . route('product_image.update', [$row->id]) . '" class="btn btn-info btn-sm edit text-light border-0" rel="tooltip" id="edit" title="Edit"
                                data-id="' . $row->id . '" data-bs-toggle="modal"
                                data-bs-target="#edit_modal" data-bs-whatever="@mdo">
                                <i class="fas fa-pencil-alt"></i> </a>

                                <a link="' . route('product_image.destroy', [$row->id]) . '" data-id="' . $row->id . '" class="btn btn-danger btn-sm shadow border-0" id="delete">
                                 <i class="fas fa-trash"></i> </a>


                                 ';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('content.product_image.product_image', compact('products'));
        //dd($request->all());
    }


    public function edit($id)
    {
        $data =  ProductImage::leftJoin('products', 'product_images.product_id', 'products.id')->select('product_images.*', 'products.product_name')->where('product_images.id', $id)->first();
        return Response()->json($data);
    }


    public function view($id)
    {
        $data = ProductImage::leftJoin('products', 'product_images.product_id', 'products.id')->select('product_images.*', 'products.product_name')->where('product_images.id', $id)->first();
        return Response()->json($data);
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'product_image' => 'required',
        ]);


        $product_id = $request->product_id;
        $product_image = $request->product_image;
        $sub_product_slug = str_slug($request->product_image);


        $product_image = $request->file('product_image');

        if (isset($product_image)) {
            $currentDate = Carbon::now()->toDateString();
            $product_image_name = $sub_product_slug . '-' . $currentDate . '-' . '.' . $product_image->getClientOriginalExtension();
            if (!file_exists('uploads/product_image')) {
                mkdir('uploads/product_image', 077, true);
            }
            $product_image->move('uploads/product_image', $product_image_name);
        } else {
            $product_image_name = 'default.png';
        }



        $data = ['product_id' => $product_id, 'product_image' => $product_image, 'sub_product_slug' => $sub_product_slug, 'product_image' => $product_image_name, 'created_at' => now(),];
        $result = DB::table('product_images')->insert($data);
        Toastr::success('product_images Inserted', 'success', ["positionClass" => "toast-top-right"]);

        if ($result) {
            $arr = 'Data Inserted.';
        } else {
            $arr = 'Something went wrong. Please try again!';
        }
        return Response()->json($arr);
    }



    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_image' => 'required',
        ]);

        $product_images =  ProductImage::find($id);


        $product_id = $request->product_id;
        $sub_product_slug = str_slug($request->product_image);
        $product_image = $request->product_image;

        $product_image = $request->file('product_image');

        if (isset($product_image)) {
            $currentDate = Carbon::now()->toDateString();
            $product_image_name = $sub_product_slug . '-' . $currentDate . '-' . '.' . $product_image->getClientOriginalExtension();
            if (!file_exists('uploads/product_image')) {
                mkdir('uploads/product_image', 077, true);
            }
            $product_image->move('uploads/product_image', $product_image_name);
        } else {
            if (isset($product_images->product_image)) {
                $product_image_name = $product_images->product_image;
            } else {
                $product_image_name = 'default.png';
            }
        }

        $data = ['product_id' => $product_id, 'product_image' => $product_image, 'sub_product_slug' => $sub_product_slug, 'product_image' => $product_image_name, 'updated_at' => now(),];
        $updated = ProductImage::where('id', $id)->update($data);

        if ($updated) {
            $array = 'Data updated.';
        } else {
            $array = 'Something went wrong. Data not updated';
        }
        return Response()->json($array);
    }



    public function destroy($id)
    {

        $result =  ProductImage::find($id);
        if ($result == true) {
            if (file_exists('uploads/product_image/' . $result->product_image)) {
                unlink('uploads/product_image/' . $result->product_image);
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
