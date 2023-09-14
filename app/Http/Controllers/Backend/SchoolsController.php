<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolsController extends Controller
{
    public function index() {
        $schools = School::all();
        $data = [
            'schools' => $schools
        ];

        return view('backend.school.list', $data);
    }

    public function createSchoolForm() {
        $types = Type::all();
        $data = [
            'types' => $types
        ];

        return view('backend.school.create', $data);
    }

    public function createSchool(Request $request) {
        $request->validate([
            'name' => ['required'],
            'type_id' => ['required', 'numeric'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'logo' => ['required', 'mimes:jpeg,jpg,png', 'max:1024']
        ]);

        $school = new School();
        $school->name = $request->name;
        $school->type_id = $request->type_id;
        $school->latitude = $request->latitude;
        $school->longitude = $request->longitude;
        $school->logo = Storage::disk('public')->put('logo', $request->logo);
        $school->note = $request->note ? $request->note : '';
        $school->save();

        return redirect()->route('school-list')->with('success', 'Create success!');
    }

    public function updateSchoolForm(School $school) {
        $types = Type::all();
        $data = [
            'types' => $types,
            'school' => $school
        ];

        return view('backend.school.edit', $data);
    }

    public function updateSchool(Request $request, School $school) {
        $request->validate([
            'name' => ['required'],
            'type_id' => ['required', 'numeric'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'logo' => ['mimes:jpeg,jpg,png', 'max:1024']
        ]);

        $school->name = $request->name;
        $school->type_id = $request->type_id;
        $school->latitude = $request->latitude;
        $school->longitude = $request->longitude;

        if ($request->hasFile('logo')) {
            // replace old image with oldName
            $oldName = explode('logo/', $school->logo)[1];
            $school->logo = Storage::disk('public')->putFileAs('logo', $request->logo, $oldName);
        }

        $school->note = $request->note ? $request->note : '';
        $school->save();

        return redirect()->route('school-list')->with('success', 'Update success!');
    }

    public function delete(Request $request) {
        $school = School::findOrFail($request->schoolId);
        if ($school->departments->count() > 0) {
            return redirect()->back()->with('warning', 'Unable to delete this `School`!');
        } else {
            Storage::disk('public')->delete($school->logo); // delete logo
            $school->delete();

            return redirect()->route('school-list')->with('success', 'Delete success!');
        }
    }

    public function detail(School $school) {
        $data = [
            'school' => $school
        ];

        return view('backend.school.detail', $data);
    }
}
