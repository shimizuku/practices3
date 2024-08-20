<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            if ($user->authority == 1) {
                return $next($request);
            } else {
                return redirect('auth');
            }
        });
    }

    public function list()
    {
        $users = User::all();
        return view('auth.users.home', compact('users'));
    }

    public function create()
    {
        return view('auth.users.form');
    }

    public function createPost(Request $request)
    {
        $this->createValidator($request->all())->validate();

        User::create($request->all());

        $users = User::all();
        return view('auth.users.home', compact('users'));
    }

    public function edit(Request $request)
    {
        $user = User::where('id',$request->input('edit'))->get();
        return view('auth.users.form', compact('user'));
    }

    public function editPost(Request $request)
    {
        $this->editValidator($request->all())->validate();
        $user = new User();

        if ($request->input('password') == "") {
            $user->save([
                'id' => $request->input('id')
                , 'name' => $request->input('name')
                , 'email' => $request->input('email')
                , 'password' => $request->input('password')
            ]);
        } else {
            $user->save($request->all());
        }

        $users = User::all();
        return view('auth.users.home', compact('users'));
    }

    protected function createValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function editValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($data['id'])],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
