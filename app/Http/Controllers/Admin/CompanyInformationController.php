<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class CompanyInformationController extends Controller
{
    public function index()
    {
        $company_information =  DB::table('company_information')->first(); 
        return view('content.company_information.company_information', ['companyinfo' => $company_information]);
    }
 
        
    public function store(Request $request)
    {
      
        // dd($request->all());
        $company_information = DB::table('company_information')->first();

        $company_logo = $request->file('company_logo');
        $company_banner = $request->file('company_banner');

        $company_name = $request->company_name;
        $phone1 = $request->phone1;
        $email1 = $request->email1;
        $phone2 = $request->phone2;
        $email2 = $request->email2;
        $start_time = $request->start_time;
        $end_time = $request->end_time; 
         
        $Address = $request->Address;

        $description = $request->description;
        $newsletter_description = $request->newsletter_description;
        $copyright = $request->copyright;

        $social_link_facebook = $request->social_link_facebook;
        $social_link_twitter = $request->social_link_twitter;
        $social_link_instragram = $request->social_link_instragram;
        $social_link_viber = $request->social_link_viber; 

        if ($company_information == null) {

            $slug = str_slug($request->email1);
            if (isset($company_logo)) {
                $currentDate = Carbon::now()->toDateString();
                $company_logo_name = $slug . '-' . $currentDate . '-' . '.' . $company_logo->getClientOriginalExtension();
                if (!file_exists('uploads/companyLogo')) {
                    mkdir('uploads/companyLogo', 077, true);
                }
                $company_logo->move('uploads/companyLogo', $company_logo_name);
            } else {
                $company_logo_name = 'default.png';
            }

            if (isset($company_banner)) {
                $currentDate = Carbon::now()->toDateString();
                $company_banner_name = $slug . '-' . $currentDate . '-' . '.' . $company_banner->getClientOriginalExtension();
                if (!file_exists('uploads/companyLogo')) {
                    mkdir('uploads/companyLogo', 077, true);
                }
                $company_banner->move('uploads/companyLogo', $company_banner_name);
            } else {
                $company_banner_name = 'default.png';
            }


            $data = [
            'company_name' => $company_name,
            'company_logo' => $company_logo_name,
            'company_banner' => $company_banner_name, 
            'phone1' => $phone1, 
            'email1' => $email1, 
            'start_time' => $start_time, 
            'start_time' => $start_time, 
            'end_time' => $end_time,
            'phone2' => $phone2,
            'email2' => $email2,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'Address' => $Address,
            'description' => $description,
            'newsletter_description' => $newsletter_description,
            'copyright' => $copyright,
            'social_link_facebook' => $social_link_facebook,
            'social_link_twitter' => $social_link_twitter,
            'social_link_instragram' => $social_link_instragram,
            'social_link_viber' => $social_link_viber,
            'created_at' => now(),
        
        ];
            DB::table('company_information')->insert($data);
            Toastr::success('Top-bar Inserted', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->back()->with('message', ' company_information Add Successfully');
        } else {

            $company_logo = $request->file('company_logo');
            $company_banner = $request->file('company_banner');
        
            $slug = str_slug($request->email1);
            if (isset($company_logo)) {
                $currentDate = Carbon::now()->toDateString();
                $company_logo_name = $slug . '-' . $currentDate . '-' . '.' . $company_logo->getClientOriginalExtension();
                if (!file_exists('uploads/companyLogo')) {
                    mkdir('uploads/companyLogo', 077, true);
                }
                $company_logo->move('uploads/companyLogo', $company_logo_name);
            } else {
                if (isset($company_information->company_logo)) {
                    $company_logo_name = $company_information->company_logo;
                } else {
                    $company_logo_name = 'default.png';
                }
            }

            if (isset($company_banner)) {
                $currentDate = Carbon::now()->toDateString();
                $company_banner_name = $slug . '-' . $currentDate . '-' . '.' . $company_banner->getClientOriginalExtension();
                if (!file_exists('uploads/companyLogo')) {
                    mkdir('uploads/companyLogo', 077, true);
                }
                $company_banner->move('uploads/companyLogo', $company_banner_name);
            } else {
                 
                if (isset($company_information->company_banner)) {
                    $company_banner_name = $company_information->company_banner;
                } else {
                    $company_banner_name = 'default.png';
                }
            }

            $data = [
                'company_name' => $company_name,
                'company_logo' => $company_logo_name,
                'company_banner' => $company_banner_name,
                'phone1' => $phone1,
                'email1' => $email1,
                'start_time' => $start_time,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'phone2' => $phone2,
                'email2' => $email2,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'Address' => $Address,
                'description' => $description,
                'newsletter_description' => $newsletter_description,
                'copyright' => $copyright,
                'social_link_facebook' => $social_link_facebook,
                'social_link_twitter' => $social_link_twitter,
                'social_link_instragram' => $social_link_instragram,
                'social_link_viber' => $social_link_viber,
                'updated_at' => now(),
            ];
            DB::table('company_information')->where('id', $company_information->id)->update($data);
            Toastr::success('Top-bar Inserted', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->back()->with('message', ' company_information Add Successfully');
        }
    }



    public function edit($id)
    {
        $data = DB::table('company_information')->where('id', $id)->first();
        return response()->json($data);
        //return view('content.tabletype.edit-tabletype', ['tabletype' => $data]);
    }



    public function destroy($id)
    {
        $company_information = DB::table('company_information')->where('id', $id)->first();

        if (file_exists('uploads/companyLogo/' . $company_information->company_logo)) {
            unlink('uploads/companyLogo/' . $company_information->company_logo);
        }
        if (file_exists('uploads/companyLogo/' . $company_information->company_banner)) {
            unlink('uploads/companyLogo/' . $company_information->company_banner);
        }
        if ($company_information == true) {
            $company_information = DB::table('company_information')->where('id', $id)->delete();
        }

        Toastr::success('Data delete Success!', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
