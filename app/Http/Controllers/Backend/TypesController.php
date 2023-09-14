<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypesController extends Controller
{
    public function index() {
        $types = Type::all();
        $data = [
            'types' => $types
        ];

        return view('backend.type.list', $data);
    }

    public function createTypeForm() {
        return view('backend.type.create');
    }

    public function createType(Request $request) {
        $request->validate([
            'name' => ['required']
        ]);

        $type = new Type();
        $type->name = $request->name;
        $type->save();

        return redirect()->route('type-list')->with('success', 'Create success!');
    }

    public function updateTypeForm(Type $type) {
        $data = [
            'type' => $type
        ];

        return view('backend.type.edit', $data);
    }

    public function updateType(Request $request, Type $type) {
        $request->validate([
            'name' => ['required']
        ]);

        $type->name = $request->name;
        $type->save();

        return redirect()->route('type-list')->with('success', 'Update success!');
    }

    public function delete(Request $request) {
        $type = Type::findOrFail($request->typeId);
        if ($type->schools->count() > 0) {
            return redirect()->route('type-list')->with('warning', 'Unable to delete this `Type`!');
        }

        $type->delete();

        return redirect()->route('type-list')->with('success', 'Delete success!');
    }

    // public function detail(Type $type) {

        public function detail() {
        $type = Type::select('*')->limit(2)->get();
        $data = [
            'type' => $type
        ];

        return view('backend.type.detail', $data);
    }
}
