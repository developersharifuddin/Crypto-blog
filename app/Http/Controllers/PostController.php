<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Validation\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content.post.post', [
            'posts' => Post::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|min:5|max:200',
            'sub_title' => 'required|max:255',
            'description' => 'required|max:100000',
            'images' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ], [
            'title.required' => 'title is required',
            'title.unique' => 'This title is already taken',
            'title.min' => 'Title max length is 5',
            'title.max' => 'Title max length is 200',

            'sub_title.required' => 'sub_title is required',
            'description.required' => 'description is required',

            'images.required' => 'images is required',
            'images.mimes' => 'Images is not a valid format in jpg, png, jpeg, gif or svg.',
            'images.max' => 'Images max size is 2048 kb',
            'images.max' => 'Images min size is 10 kb',
        ]);



        date_default_timezone_set("Asia/Dhaka");

        $title = str_slug($request->title);
        $images = $request->file('images');

        if (isset($images)) {
            $currentDate = Carbon::now()->toDateString();
            $images_name = $title . '-' . uniqid() . '_' . $currentDate . '-' . '.' . $images->getClientOriginalExtension();
            if (!file_exists('uploads/images')) {
                mkdir('uploads/images', true);
            }
            $images->move('uploads/images', $images_name);
        } else {
            $images_name = 'default.png';
        }


        $user_id = Auth()->user()->id;
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $ip_address = request()->ip();


        $post = new Post();
        $post->user_id = $user_id;
        $post->title = $request->title;
        $post->sub_title = $request->sub_title;
        $post->description = $request->description;
        $post->logo = $request->logo;
        $post->images = $images_name;
        $post->is_active = true;
        $post->user_agent = $user_agent;
        $post->ip_address = $ip_address;
        $post->save();
        Session::flash('message', 'Successfully created shark!');
        return redirect('post')->with('status', 'Product Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function view()
    {
        return view('content.post.create2');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('content.post.edit', [
            'post' => Post::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:5|max:200',
            'sub_title' => 'required|max:255',
            'description' => 'required|max:100000',
            'images' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ], [
            'title.required' => 'title is required',
            'title.unique' => 'This title is already taken',
            'title.min' => 'Title max length is 5',
            'title.max' => 'Title max length is 200',

            'sub_title.required' => 'sub_title is required',
            'description.required' => 'description is required',
        ]);



        $post = Post::find($id);

        $title = str_slug($request->title);
        $images = $request->file('images');

        if (isset($images)) {
            $currentDate = Carbon::now()->toDateString();
            $images_name = $title . '-' . uniqid() . '_' . $currentDate . '-' . '.' . $images->getClientOriginalExtension();
            if (!file_exists('uploads/images')) {
                mkdir('uploads/images', true);
            }
            $images->move('uploads/images', $images_name);
        } else {
            if (isset($post->images)) {
                $images_name = $post->images;
            }
        }


        $user_id = Auth()->user()->id;
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $ip_address = request()->ip();



        $post->user_id = $user_id;
        $post->title = $request->title;
        $post->sub_title = $request->sub_title;
        $post->description = $request->description;
        $post->images = $images_name;
        $post->is_active = true;
        $post->user_agent = $user_agent;
        $post->ip_address = $ip_address;
        $post->save();
        Session::flash('message', 'Successfully created shark!');
        return redirect('post')->with('status', 'Product Has Been Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route('post.index')->with('success', 'Connection destroyed Successfully');
    }


    public function status(Request $request)
    {
        try {
            Post::where('id', $request->id)->update(['is_active' => (int) $request->is_active]);
            return response()->json('Successfully status changed', 200);
        } catch (\Exception $error) {
            return response()->json($error->getMessage(), 422);
        }
        dd($request->id);
    }



    public function trashed()
    {
        $trashData = Post::withTrashed()->whereNotNull('deleted_at')->paginate(15);
        // return view('content.post.trash', ['trashlist' => $trashData]);
        return view('content.post.trash', [
            'posts' => Post::withTrashed()->whereNotNull('deleted_at')->paginate(15),
        ]);
    }


    public function restore($id)
    {
        try {
            Post::where('id', $id)->restore();
            return response()->json('Successfully Restored !', 200);
        } catch (\Exception $error) {
            return response()->json($error->getMessage(), 422);
        }
    }


    public function delete($id)
    {
        try {
            DB::table('posts')->where('id', $id)->delete();
            return response()->json('Database Parmanently Removed.', 200);
        } catch (\Exception $error) {
            return response()->json($error->getMessage(), 422);
        }
    }
}
