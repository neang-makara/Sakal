<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Type;
use App\Models\School;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index() {
        $types = Type::all();
        $data = [
            'types' => $types
        ];
        $data['sliders'] =  Slider::where('status',1)->orderBy('id', 'DESC')->get();

        // dd($data);
        return view('frontend.home', $data);
    }

    public function viewSchoolsByType(Request $request, Type $type) {
        $data = [
            'type' => $type
        ];
        return view('frontend.schools_by_type', $data);
    }

    public function schoolDetail(Request $request, School $school) {
        $selectedDepartmentId = 0;
        if ($request->has('department') && $request->query('department') != null) {
            $selectedDepartmentId = $request->query('department');
        } else if ($school->departments()->orderBy('name')->first() != null) {
            $selectedDepartmentId = $school->departments()->orderBy('name')->first()->id;
        }

        $data = [
            'school' => $school,
            'selectedDepartmentId' => $selectedDepartmentId
        ];

        return view('frontend.school_detail', $data);
    }
}
