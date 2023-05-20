<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Size;
use App\Models\brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        //dd($request->all());
        $categories =  Category::get();
        $sub_categories =  SubCategory::get();
        $products =  Product::get();
        $brands =  Brand::get();
        $product_images =  ProductImage::get();
        $colors =  Color::get();
        $sizes =  Size::get();


        if ($request->ajax()) {
            // $data =  Product::select('products.*', 'categories.category_name', 'sub_categories.sub_category_name', 'brands.brand_name', 'products.product_image')
            //     ->leftJoin('categories', 'categories.id', 'products.category_id')
            //     ->leftJoin('sub_categories', 'sub_categories.id', 'products.sub_category_id')
            //     ->leftJoin('brands', 'brands.id', 'products.brands_id')
            //     ->leftJoin('product_images', 'product_images.id', 'products.product_image_id')
            //     ->get();
            $data =  Product::select('products.*', 'categories.category_name','sub_categories.sub_category_name','brands.brand_name', 'product_images.product_image')
                ->leftJoin('categories', 'categories.id', 'products.category_id')
                ->leftJoin('sub_categories', 'sub_categories.id', 'products.sub_category_id')
                ->leftJoin('brands', 'brands.id', 'products.brand_id')
                ->leftJoin('product_images', 'product_images.product_id', 'products.id')
                ->get();
            // $data =  DB::table('products')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a link="' . route('product.update', [$row->id]) . '" class="btn btn-info btn-sm edit text-light border-0" rel="tooltip" id="edit" title="Edit"
                                data-id="' . $row->id . '" data-bs-toggle="modal"
                                data-bs-target="#edit_modal" data-bs-whatever="@mdo">
                                <i class="fas fa-pencil-alt"></i> </a>

                               <a href="" class="btn btn-primary btn-sm text-light view border-0" id="view" rel="tooltip" title="view"
                                data-id="' . $row->id . '" data-bs-toggle="modal"
                                data-bs-target="#viewModal"> <i class="fas fa-eye"></i> </a>

                                <a link="' . route('product.destroy', [$row->id]) . '" data-id="' . $row->id . '" class="btn btn-danger btn-sm shadow border-0" id="delete">
                                 <i class="fas fa-trash"></i> </a>';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);

        }

        return view('content.product.product', ['categories' => $categories, 'products' => $products, 'product_images' => $product_images, 'brands' => $brands, 'sub_categories' => $sub_categories, 'colors' => $colors, 'sizes' => $sizes]);
        //dd($request->all());


        // if ($request->ajax()) {
        //       $data =  Product::select('products.*', 'categories.category_name','sub_categories.sub_category_name','brands.brand_name', 'product_images.product_image')
        //         ->leftJoin('categories', 'categories.id', 'products.category_id')
        //         ->leftJoin('sub_categories', 'sub_categories.id', 'products.sub_category_id')
        //         ->leftJoin('brands', 'brands.id', 'products.brand_id')
        //         ->leftJoin('product_images', 'product_images.product_id', 'products.id')
        //         ->get();
        //      return DataTables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function ($row) {
        //             $actionbtn = '<a link="' . route('product.update', [$row->id]) . '" class="btn btn-info btn-sm edit text-light border-0" rel="tooltip" id="edit" title="Edit"
        //                         data-id="' . $row->id . '">
        //                         <i class="fas fa-pencil-alt"></i> </a>

        //                        <a href="" class="btn btn-primary btn-sm text-light view border-0" id="view" rel="tooltip" title="view"
        //                         data-id="' . $row->id . '" data-bs-toggle="modal"
        //                         data-bs-target="#viewModal"> <i class="fas fa-eye"></i> </a>

        //                         <a link="' . route('product.destroy', [$row->id]) . '" data-id="' . $row->id . '" class="btn btn-danger btn-sm shadow border-0 my-1" id="delete">
        //                          <i class="fas fa-trash"></i> </a>';
        //             return $actionbtn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);

        // }

        // return view('content.product.product', ['categories' => $categories, 'products' => $products, 'product_images' => $product_images, 'brands' => $brands, 'sub_categories' => $sub_categories, 'colors' => $colors, 'sizes' => $sizes]);
        // //dd($request->all());
    }


    public function edit($id)
    {
        $data = Product::leftJoin('categories', 'products.category_id', 'categories.id')->select('products.*', 'categories.category_name')->where('products.id', $id)->first();
        return Response()->json($data);
    }


    public function view($id)
    {
        $data =
        Product::select('products.*', 'categories.category_name','sub_categories.sub_category_name','brands.brand_name', 'product_images.product_image')
        ->leftJoin('categories', 'categories.id', 'products.category_id')
        ->leftJoin('sub_categories', 'sub_categories.id', 'products.sub_category_id')
        ->leftJoin('brands', 'brands.id', 'products.brand_id')
        ->leftJoin('product_images', 'product_images.product_id', 'products.id')
        ->where('products.id', $id)->first();
       
        return Response()->json($data);
    }



    public function store(Request $request)
    {

        // dd($request->all());
        $this->validate($request, [
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'product_name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required',
            'sale_price' => 'required',
            'product_code' => 'required',
            'stock_status' => 'required',
            //'featured' => 'required',
            'quantity' => 'required',
            'size_name' => 'required',
            'color_name' => 'required',
        ]);


        DB::beginTransaction();
        try {



            $product = new Product();
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->brand_id = $request->brand_id;

            $product->product_name = $request->product_name;
            $product->product_slug = str_slug($request->product_name);

            $product->short_description = $request->short_description;
            $product->description = $request->description;

            $product->regular_price = $request->regular_price;
            $product->sale_price = $request->category_id;
            $product->stock_status = $request->stock_status;

            $product->product_code = $request->product_code;
            $product->quantity = $request->quantity;


            $color_name = array($request->color_name);
            $size_name = array($request->size_name);

            // for ($i = 0; $i < count($color_name); $i++) {
            //     $a = $product->color_id = json_encode($color_name[$i]);
            // }
            // for ($i = 0; $i < count($size_name); $i++) {
            //     $product->size_id =  json_encode($size_name[$i]);
            // }


            //$test['token'] = time();

            $color_name = $request->only('color_name');
            $size_name = $request->only('size_name');

            $a =  $test['color_id'] = json_encode($color_name);
            $b =  $test['size_id'] = json_encode($size_name);


            //   $product->color_id = json_encode($color_name);
            //   $product->size_id =  json_encode($size_name);

            // $product = Product::all();
            // return $product->toArray();

           // dd($a);
            $product->save();



            $product_id = $product->id;

            $product_slug  = $product->product_slug;
            $product_image = $request->file('product_image');

            if ($request->hasFile('product_image')) {
                $files = $request->file('product_image');
                foreach ($files as $file) {
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $product_image_name = $filename. "-" . date('his') . "-" . str_random(3) . "." . $extension;
                    $destinationPath = 'uploads/product_image' . '/';
                    $file->move($destinationPath, $product_image_name);
                }
            }

            $product_image = new ProductImage();
            $product_image->product_id = $product_id;
            $product_image->product_image = $product_image_name;
            $product_image->save();


            // $size_name = $request->size_name;
            // for ($i = 0; $i < count($size_name); $i++) {
            //     $module_permission2 = [
            //         'product_id' => $product_id,
            //         'size_name' =>  $size_name[$i],
            //     ];
            //     DB::table('sizes')->insert($module_permission2);
            // }




            // for ($i = 0; $i < count($color_name); $i++) {
            //     $module_permission3 = [
            //         'product_id' => $product_id,
            //         'color_name' =>  $color_name[$i],
            //     ];
            //     DB::table('colors')->insert($module_permission3);
            // }


            DB::commit();

            Toastr::success('Data Added Success!', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.product');
        } catch (\Exception $e) {
            //Toastr::success('Data Added Success!', 'success', ["positionClass" => "toast-top-right"]);
            DB::rollBack();
            return redirect()->back();
        }





        // if ($result) {
        //     $arr = 'Data Inserted.';
        // } else {
        //     $arr = 'Something went wrong. Please try again!';
        // }
        // return Response()->json($arr);
    }



    public function update(Request $request, $id)
    {

         //dd($request->all());


        DB::beginTransaction();
        try {
            $this->validate($request, [
                'category_id' => 'required',
                'sub_category_id' => 'required',
                'product_name' => 'required',
                'short_description' => 'required',
                'description' => 'required',
                'regular_price' => 'required',
                'sale_price' => 'required',
                'product_code' => 'required',
                'stock_status' => 'required',
                //'featured' => 'required',
                'quantity' => 'required',
                'size_name' => 'required',
                'color_name' => 'required',
            ]);


            $product = Product::find($id);
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->brand_id = $request->brand_id;

            $product->product_name = $request->product_name;
            $product->product_slug = str_slug($request->product_name);

            $product->short_description = $request->short_description;
            $product->description = $request->description;

            $product->regular_price = $request->regular_price;
            $product->sale_price = $request->category_id;
            $product->stock_status = $request->stock_status;

            $product->product_code = $request->product_code;
            $product->quantity = $request->quantity;

            // $size_name = $request->size_name;
            // $color_name = $request->color_name;
            // for ($i = 0; $i < count($size_name); $i++) {}
            $product->color_id = $request->color_name;
            $product->size_id =  $request->size_name;
            $product->save();

            $product_id = $product->id;

            $product_slug  = $product->product_slug;
            $product_image = $request->file('product_image');


            if ($request->hasFile('product_image')) {
                $files = $request->file('product_image');
                foreach ($files as $file) {
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $product_image_name = $filename. "-" . date('his') . "-" . str_random(3) . "." . $extension;
                    $destinationPath = 'uploads/product_image' . '/';
                    $file->move($destinationPath, $product_image_name);
                }
            }


            $product_image =  ProductImage::find($product_id);
            $product_image->product_id = $product_id;
            $product_image->product_image = $product_image_name;
            $product_image->save();


            // $size_name = $request->size_name;
            // for ($i = 0; $i < count($size_name); $i++) {
            //     $module_permission2 = [
            //         'product_id' => $product_id,
            //         'size_name' =>  $size_name[$i],
            //     ];
            //     DB::table('sizes')->insert($module_permission2);
            // }




            // for ($i = 0; $i < count($color_name); $i++) {
            //     $module_permission3 = [
            //         'product_id' => $product_id,
            //         'color_name' =>  $color_name[$i],
            //     ];
            //     DB::table('colors')->insert($module_permission3);
            // }


            DB::commit();
           return redirect()->route('admin.product');
        } catch (\Exception $e) {
             DB::rollBack();
            return redirect()->back();
        }





        // if ($result) {
        //     $arr = 'Data Inserted.';
        // } else {
        //     $arr = 'Something went wrong. Please try again!';
        // }
        // return Response()->json($arr);
    }


    // public function update1(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'sub_category_name' => 'required',
    //     ]);

    //     $products = DB::table('products')->first();


    //     $category_id = $request->category_id;
    //     $sub_category_slug = str_slug($request->sub_category_name);
    //     $sub_category_name = $request->sub_category_name;

    //     $products_image = $request->file('products_image');

    //     if (isset($products_image)) {
    //         $currentDate = Carbon::now()->toDateString();
    //         $products_image_name = $sub_category_slug . '-' . $currentDate . '-' . '.' . $products_image->getClientOriginalExtension();
    //         if (!file_exists('uploads/products_image')) {
    //             mkdir('uploads/products_image', 077, true);
    //         }
    //         $products_image->move('uploads/products_image', $products_image_name);
    //     } else {
    //         if (isset($products->products_image)) {
    //             $products_image_name = $products->products_image;
    //         } else {
    //             $products_image_name = 'default.png';
    //         }
    //     }

    //     $data = ['category_id' => $category_id, 'sub_category_name' => $sub_category_name, 'sub_category_slug' => $sub_category_slug, 'products_image' => $products_image_name, 'updated_at' => now(),];
    //     $updated = DB::table('products')->where('id', $id)->update($data);

    //     if ($updated) {
    //         $array = 'Data updated.';
    //     } else {
    //         $array = 'Something went wrong. Data not updated';
    //     }

    //     return Response()->json($array);
    // }



    public function destroy1($id)
    {

        $result = DB::table('products')->where('id', $id)->first();
        $product_images = DB::table('product_images')->where('product_id', $id)->first();

        if ($product_images == true) {
            if (file_exists('uploads/products_image/' . $product_images->products_image)) {
                unlink('uploads/products_image/' . $product_images->products_image);
            }

            $result = DB::table('products')->where('id', $id)->delete();

            if ($result) {
                $arr = 'Data deleted.';
            } else {
                $arr = 'Something went wrong. Please try again!';
            }
        }



        return Response()->json($arr);
    }

    public function destroy($id)
    {
        $result = Product::find($id)->first();
        if ($result == true) {
            if (file_exists('uploads/products_image/' . $result->products_image)) {
                unlink('uploads/products_image/' . $result->products_image);
            }
            $result = DB::table('products')->where('id', $id)->delete();
            if ($result) {
                $arr = 'Data deleted.';
            } else {
                $arr = 'Something went wrong. Please try again!';
            }
        }

        return Response()->json($arr);
    }
}
