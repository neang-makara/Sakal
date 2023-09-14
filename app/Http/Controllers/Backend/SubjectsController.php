<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller {

    public function index() {
        // $subjects = Subject::orderBy('id', 'asc')->take(5)->get();
        // $subjects = Subject::all();
        $subjects = Subject::with('department')->get()
            ->sortBy('department.name')
            ->sortBy('department.school.name');

        $data = [
            'subjects' => $subjects
        ];

        return view('backend.subject.list', $data);
    }

    public function createSubjectForm() {
        $departments = Department::all();
        $data = [
            'departments' => $departments
        ];

        return view('backend.subject.create', $data);
    }

    public function createSubject(Request $request) {
        $request->validate([
            'name' => ['required'],
            'department_id' => ['required', 'numeric']
        ]);

        $subject = new Subject();
        $subject->name = $request->name;
        $subject->department_id = $request->department_id;
        $subject->save();

        return redirect()->route('subject-list')->with('success', 'Create success!');
    }

    public function updateSubjectForm(Subject $subject) {
        $departments = Department::all();
        $data = [
            'departments' => $departments,
            'subject' => $subject
        ];

        return view('backend.subject.edit', $data);
    }

    public function updateSubject(Request $request, Subject $subject) {
        $request->validate([
            'name' => ['required'],
            'department_id' => ['required', 'numeric']
        ]);

        $subject->name = $request->name;
        $subject->department_id = $request->department_id;
        $subject->save();

        return redirect()->route('subject-list')->with('success', 'Update success!');
    }

    public function delete(Request $request) {
        $subject = Subject::findOrFail($request->subjectId);
        $subject->delete();

        return redirect()->route('subject-list')->with('success', 'Delete success!');
    }

    public function detail(Subject $subject) {
        $data = [
            'subject' => $subject
        ];

        return view('backend.subject.detail', $data);
    }
}
