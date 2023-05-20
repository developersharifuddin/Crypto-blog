<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (Auth::id()) {
            if (Auth::user()) {

                $contactListcount = DB::table('contact_us')->get();
                $visitors = DB::table('visitors')->get();
                $TotalVisitor=DB::table('visitors')->count();
                $posts=DB::table('posts')->count();

                if (Schema::hasTable('contact_us')==true) {
                    $contactList = DB::table('contact_us')->get();
                    $contactUS = DB::table('contact_us')->take(4)->get();
                }
                $company_information =  DB::table('company_information')->get();
                $users = DB::table('users')->get();
                 return view('admin.home', [
                    'contactUS' => $contactUS,
                    'contactListcount' => $contactListcount,
                    'contactList' => $contactList,
                    'users' => $users,
                    'companyInformation' => $company_information,
                    'TotalVisitor' => $TotalVisitor,
                    'visitors' => $visitors,
                    'posts' => $posts,

                ]);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function visitors()
    {
        $visitors = DB::table('visitors')->get();
        return view('admin.visitor', [
            'visitors' => $visitors,
        ]);
    }
}
