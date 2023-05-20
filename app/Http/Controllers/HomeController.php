<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
          return view('frontend.index', [
            'posts' => Post::where('is_active', 1)
            ->leftJoin('users', 'posts.user_id', 'users.id')
            ->select('posts.*', 'users.name')->get(),
                'old_posts' => Post::where('is_active', 1)->get(), 
            ]);
            date_default_timezone_set("Asia/Dhaka");
                $visit_time = now();
                $ip_address = request()->ip();
                $data=([
                    'ip_address' =>$ip_address,
                    'visit_time' => $visit_time,
                ]);
                DB::table('visitors')->insert($data); 
    }

    public function singlepost($id)
    {
            return view('frontend.single-post', [
                'post' => Post::where('id', $id)->where('is_active', 1)->first(),
                'posts' => Post::where('is_active', 1)->get(),
            ]);

    }
    public function contact()
    {
            return view('frontend.contact', [
                'posts' => Post::where('is_active', 1)->get(),
            ]);

    }
    public function commingsoon()
    {
            return view('frontend.coming-soon', [
                // 'post' => Post::where('id', $id)->where('is_active', 1)->first(),
                'posts' => Post::where('is_active', 1)->get(),
             
  'programs' =>  DB::table('programs')
  ->orderBy('id', 'Desc')
  ->first(),
            ]);

    }
    public function about()
    {
            return view('frontend.about-us', [
                'posts' => Post::where('is_active', 1)->get(),
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function contactus(Request $request) {
        // Form validation
         $this->validate($request,[
            'name'=>'required|string|max:25',
            'email' => 'required|email',
            'subject' => 'required',
            'description' => 'required|string'
        ],
        [
            'name.required'=> 'Please input your name',
            'email.required'=> 'Please input your email',
            'description.required'=> 'Please input your message',
            'name.max'=>'your Name Less Than 25 Charaters'
        ]);
        $UserIP=$_SERVER['REMOTE_ADDR'];
        //  Store data in database

        DB::table('contact_us')->insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'description'=>$request->description,
            'ip_address' =>$UserIP,
        ]);

        Session::flash('We have received your message..');
        return redirect()->route('contact');

    }



}
