<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Admin | contact list</title>
    <style>
        @page {
            header: page-header;
            footer: page-footer;
        }

        .table-header .tr th {
            background: #D0E4F5;
            padding: 15px 3px;
            font-size: 11px;
            font-weight: bold;
            text-align: left;
        }

        body {
            font-family: 'nikosh', "Roboto Thin", sans-serif;
            width: 100%;
        }

        /* body {
            font-family: 'SutonnyMJRegular';
            width: 100%;
        } */

        td,
        tr,
        th {
            border: .5px solid #e6e6e6;
            max-width: 100%;
        }

        table.blueTable {
            border: .5px solid #e6e6e6 !important;
            background-color: white;
            width: 100%;
            text-align: left;
            border-collapse: collapse;
        }

        table #thm-bg2 th {
            background: #fff !important;
        }

        table.blueTable td,
        table.blueTable th {
            border-left: .5px solid #aaa;
            padding: 8px 14px;
            text-align: right;
        }

        table.blueTable tbody td {
            font-size: 11px;
        }

        table.blueTable tr:nth-child(odd) {
            background: #f9f9f9;
        }

        table.blueTable .th th {
            color: white !important;
            background: #e6e6e6;
            text-align: center;
        }

        table.blueTable th {
            font-size: 13px;
            color: #333;
            border-left: 0px solid #D0E4F5;
        }

        table.blueTable thead th:first-child {
            border-left: none;
        }


        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
    </style>
</head>

<body>
    <htmlpageheader name="page-header">
        <div class="row" style="display:inline-block">
            <div class="col-md-6" style="width:60%; float:left;">
                <p style="text-align: left; font-size:10px">Report of User Contact</p>
            </div>
            <div class="col-md-6" style="float: right; width: 38%; text-align: right; font-size: 11px;">
                <span style="float:right;"> Date: {DATE j-m-Y}</span>
            </div>
         </div>
    </htmlpageheader>

    <section id="ajax-datatable">
        <div class="row">
            <div style="width:100%; text-align: center; font-size: 14px;">
                <p style="line-height: 1.5; background:#eee"><b> Report Of User Contact </b> </p>
            </div>
        </div>

        <div class='text my_form' style='margin:0px 0 0 0; padding:0px 0 0 0;  border-style:dotted; border-color:white;'>
            <div class="row mb-2">
                <div class="col-12 mt-2">
                    <div class="card border-secoundary rounded-bottom rounded-0 shadow-none">
                        <div class="card-body card-datatable table-responsive p-0">

                            <table style="width: 100%;">
                                <tr class="" style="border: none; background:none">
                                    <th colspan="3" style="text-align: left; border: none;">
                                        @php $topbar = DB::table('top_bars')->first(); @endphp
                                        <img src="uploads/companyLogo/{{$topbar->company_logo}}" height="70px"></img>
                                        <br>
                                    </th>

                                    <th colspan="3" style="border: none; float:right; width: 100%; text-align: right; font-size:12px">
                                        <!-- Pending : 15 <br />
                                        Response : 5 <br> -->
                                        @php
                                        $total = DB::table('contact_us')->get();
                                        @endphp

                                        Total mssage : {{$total->count()}}

                                    </th>
                                </tr>
                            </table>
                            <br>
                            <table class="table blueTable">
                                <tr class="thm-bg th">
                                    <th colspan="8" style="color:#111"><b> Contact List </b></th>
                                </tr>
                                <tr class="thm-bg" id="thm-bg2">
                                    <th>S/L</th>
                                    <th>IP Address</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                </tr>
                                <tbody id="tablebody">
                                    @foreach($data as $key=>$contact)
                                    <tr class="row-item  p-0 tr thm-bg" style="border: 0.5px solid #e6e6e6;">
                                        <td>{{$key+1}}</td>
                                        <td>{{$contact->ip_address}}</td>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->subject}}</td>
                                        <td>{{$contact->description}}</td>
                                        <td>{{date('d-M-Y h:i A',strtotime($contact->created_at))}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table> <br>
                        </div>
                    </div>
                </div>
            </div>
            <htmlpagefooter name="page-footer">
                <div class="row" style="padding: 10px 0px;">
                    <div class="col-md-6" style="float: left; width: 50.33%">
                        <p style="float:left;font-size: 11px;"> Developed By Dev-team <br>
                            <span style="font-size: 8px; ">Report No.: 011A</span>
                        </p>
                    </div>
                    <div class="col-md-6" style="float: right; width: 33.33%; text-align: right; font-size: 12px;">
                        <p style="float:right">{PAGENO} of {nbpg} pages</p>
                    </div>
                </div>
            </htmlpagefooter>
    </section>
</body>

</html>
