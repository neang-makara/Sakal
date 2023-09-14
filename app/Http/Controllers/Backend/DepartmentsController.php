<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\School;
use Illuminate\Http\Request;

class DepartmentsController extends Controller {

    public function index() {
        $departments = Department::with('school')->get()->sortBy('school.name');
        $data = [
            'departments' => $departments
        ];

        return view('backend.department.list', $data);
    }

    public function createDepartmentForm() {
        $schools = School::all();
        $data = [
            'schools' => $schools
        ];

        return view('backend.department.create', $data);
    }

    public function createDepartment(Request $request) {
        $request->validate([
            'name' => ['required'],
            'school_id' => ['required', 'numeric']
        ]);

        $department = new Department();
        $department->name = $request->name;
        $department->school_id = $request->school_id;
        $department->save();

        return redirect()->route('department-list')->with('success', 'Create success!');
    }

    public function updateDepartmentForm(Department $department) {
        $schools = School::all();
        $data = [
            'schools' => $schools,
            'department' => $department
        ];

        return view('backend.department.edit', $data);
    }

    public function updateDepartment(Request $request, Department $department) {
        $request->validate([
            'name' => ['required'],
            'school_id' => ['required', 'numeric']
        ]);

        $department->name = $request->name;
        $department->school_id = $request->school_id;
        $department->save();

        return redirect()->route('department-list')->with('success', 'Update success!');
    }

    public function delete(Request $request) {
        $department = Department::findOrFail($request->departmentId);
        if ($department->subjects->count() > 0) {
            return redirect()->back()->with('warning', 'Unable to delete this `Department`!');
        }

        $department->delete();

        return redirect()->route('department-list')->with('success', 'Delete success!');
    }

    public function detail(Department $department) {
        $data = [
            'department' => $department
        ];

        return view('backend.department.detail', $data);
    }
}
