<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        //$this->middleware('guest')->except('logout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {            
            return redirect('admin')
                        ->withErrors($validator)
                        ->withInput();
        }


        if (Auth::attempt(['email' => request('email'), 'password' => request('password'), 'is_admin' => 1])) {
            // Authentication passed...
            return redirect('admin/dashboard');
        }else{
            return back()->with('error','invalid login id and password');
        }
    }
    public function dashboard()
    { 
        return view('admin.dashboard');
    }

    public function users()
    { 
        $data['users'] = User::where('is_admin',0)->get();  
        return view('admin.users',$data);
    }
    public function logout(Request $request) {
      Auth::logout();
      return redirect('/admin');
    }
}
