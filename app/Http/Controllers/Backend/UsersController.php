<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Validation\Rules\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        $data = [
            'users' => $users
        ];
        return view('backend.user.list', $data);
    }

    public function createUserForm()
    {
        return view('backend.user.create');
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'username' => ['required', 'min:6'],
            //'password' => ['required', 'min:6', 'confirmed'],
            'password' => [
                'required',
                'string',
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
            'password_confirmation' => ['required']
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user-list')->with('success', 'Create success!'); // with function means flash data
    }

    public function block(User $user)
    {
        if ($user->is_admin) {
            return redirect()->route('user-list')->with('warning', 'Unable to modify admin user!');
        }

        $user->disabled = true;
        $user->save();

        return redirect()->route('user-list')->with('success', 'Block success!');
    }

    public function unblock(User $user)
    {
        if ($user->is_admin) {
            return redirect()->route('user-list')->with('warning', 'Unable to modify admin user!');
        }
        $user->disabled = false;
        $user->save();

        return redirect()->route('user-list')->with('success', 'Unblock success!');
    }

    public function delete(Request $request)
    {
        $user = User::find($request->userId);

        if ($user->is_admin) {
            return redirect()->route('user-list')->with('warning', 'Unable to delete admin user!');
        }

        $user->delete();

        return redirect()->route('user-list')->with('success', 'Delete success!');
    }

    public function updateUserForm(User $user)
    {
        $data = [
            'user' => $user
        ];

        return view('backend.user.edit', $data);
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required']
        ]);

        if ($request->password != null) {
            $request->validate([
                //'password' => ['required', 'min:6', 'confirmed'],
                'password' => [
                    'required',
                    'string',
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/', // must contain a special character
                    Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised()

                ],

            ]);

            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->save();

        return redirect()->route('user-list')->with('success', 'Update success!');
    }

    public function detail(User $user)
    {
        $data = [
            'user' => $user
        ];

        return view('backend.user.detail', $data);
    }
}
