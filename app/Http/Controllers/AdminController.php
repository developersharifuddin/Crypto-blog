<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Models\ContactRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin()
    {
        if (Auth::id()) {
            if (Auth::user()) {
                // $contactUS = DB::table('contact_us')->take(4)->get();
                // $contactListcount = DB::table('contact_us')->get();
                // $contactList = DB::table('contact_us')->get();
                $company_information =  DB::table('company_information')->get();
                $users = DB::table('users')->get();
                $headers = DB::table('headers')->take(4)->get();
                 return view('admin.home', [
                    //  'contactListcount' => $contactListcount,
                    // 'contactList' => $contactList,
                    'users' => $users,
                    'companyInformation' => $company_information,
                    'headers' => $headers,

                ]);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function contactData()
    {

        if(Auth::id())
        {
            if(Auth::user())
            {

                $contactUS = DB::table('contact_us')->orderBy('id', 'DESC')->get();
                return view('content.contact.contact', ['contactUS' => $contactUS]);
            }
            else
            {
                return redirect()->back();
            }

        }
        else
        {
            return redirect('login');
        }
    }

}
