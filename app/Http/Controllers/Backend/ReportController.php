<?php

namespace App\Http\Controllers\Backend;

use App\Exports\ExportUser;
use Illuminate\Http\Request;
use App\Models\WebStudentsSubmit;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index(){
        $data['reports'] = WebStudentsSubmit::orderBy('id', 'DESC')->get();
        // dd($data);
        return view('backend.report.index', $data);
    }

    public function export(Request $request){
        return Excel::download(new ExportUser, 'report.xlsx');
    }

}
