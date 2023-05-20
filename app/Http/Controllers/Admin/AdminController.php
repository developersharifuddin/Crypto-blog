<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
     public function admin()
    {
        if(Auth::id())
        {
            if(Auth::user())
            {
                return view('admin.home');
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
