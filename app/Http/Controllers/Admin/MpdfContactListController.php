<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use PDF;

class MpdfContactListController extends Controller
{

    public function viewPdfContactList()
    {
        // ini_set("pcre.backtrack_limit", "5000000000000000000");
        // ini_set("memory_limit", "4096M");
        // ini_set('max_execution_time', 600);


        $data = DB::table('contact_us')->get();

        if (count($data) < 1) {
            return '<h1 style="text-align: center;">No Data Found.</h1>';
        } else {
            // ini_set("pcre.backtrack_limit", "5000000000000000000");
            // ini_set("memory_limit", "4096M");
            // ini_set('max_execution_time', 600);


            //$filename = $data[0]->bill_cycle_name.'.pdf';
            $filename = $data[1]->name . '.pdf';
            $pdf = PDF::loadView('content.contact_pdf.viewPdfContruct', ['data' => $data], [], [
                'mode' => '',
                'format' => 'A4-L',
                'default_font_size' => '12',
                'default_font' => 'SutonnyMJRegular',
                'margin_left' => 10,
                'margin_right' => 10,
                'margin_top' => 10,
                'margin_bottom' => 15,
                'margin_header' => 2,
                'margin_footer' => 5,
                'orientation' => 'L',
                'title' => 'Laravel mPDF',
                'author' => '',
                'watermark' => '',
                'show_watermark' => false,
                'watermark_font' => 'SutonnyMJRegular',
                'display_mode' => 'fullpage',
                'watermark_text_alpha' => 0.1,
                'custom_font_dir' => '',
                'custom_font_data' => [],
                'auto_language_detection' => false,
                'temp_dir' => rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR),
                'pdfa' => false,
                'pdfaauto' => false,
            ]);



            return $pdf->stream($filename . '.pdf');
        }
    }
}
