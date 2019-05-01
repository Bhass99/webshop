<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\User;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{

    public function index()
    {
        return view('pages.login');
    }


    public function create()
    {
        return view('pages.register');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'phone_number' => ['nullable'],
            'street' => ['required'],
            'postal_code' => ['required','max:40'],
            'house_number' => ['required','max:40'],
            'role' => ['nullable'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'password' => ['required', 'string', 'min:6',],
        ]);

        $pass = $request->input('password');
        $User = new User($request->all());
        $User->password = bcrypt($pass);
        $User->save();

        return redirect()->route('users.index')->with('success', 'Account aangemaakt');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {

    }
    public function login(Request $request)
    {
        // $this->validate($request[

        // ]);
         $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('checkout/information');
        }
        return redirect()->back()->with('error', 'Email and/or password is invalid.');
        
    }


}
