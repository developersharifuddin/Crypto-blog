<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class nextProgramController extends Controller
{
    public function index()
    {
        $programs =  DB::table('programs')->latest()->paginate(10);
        return view('content.programs.programs', ['programs' => $programs]);
    }

    public function create($id)
    {
        return view('content.programs.create');
    }
    public function edit($id)
    {
        $programs =  DB::table('programs')->where('id', $id)->first();
        return view('content.programs.edit', ['programs' => $programs]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'title' => 'required',
        ]);

        $date = $request->date;
        $title = $request->title;


        $data = ['date' => $date, 'title' => $title, 'created_at' => now(),];
        DB::table('programs')->insert($data);
        Toastr::success('programs Inserted', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('message', ' programs Add Successfully');
    }



    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'date' => 'required',
            'title' => 'required',

        ]);

        //dd($request->all());
        $programs = DB::table('programs')->first();
        $date = $request->date;
        $title = $request->title;
        $data = ['date' => $date, 'title' => $title, 'updated_at' => now(),];
        DB::table('programs')->where('id', $id)->update($data);
        Toastr::success('programs update', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('message', ' Next programs updated Successfully');
    }



    public function destroy($id)
    {
        $programs = DB::table('programs')->where('id', $id)->first();
        $programs = DB::table('programs')->where('id', $id)->delete();
        Toastr::success('Data delete Success!', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
