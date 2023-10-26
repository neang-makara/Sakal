<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\WebStudentsSubmit;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index(){
        $data['reports'] = WebStudentsSubmit::orderBy('id', 'DESC')->get();
        // dd($data);
        return view('backend.report.index', $data);
    }

}
