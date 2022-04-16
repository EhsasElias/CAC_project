<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
   
    public function listAll(){
        return view('admin.users.list_users');
    }

    public function showLogin(){
        return view('admin.login');
        if(Auth::check())
        return redirect()->route($this->checkRole());
        else 
        return view('admin.login');
    }

    public function login(Request $request){
     //  return request();
       // return $request->pass; return $request->email;
  
       // if(Auth::attempt(['email'=>$request->email_username,'password'=>$request->user_pass,'is_active'=>1])){
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->pass])){
                $user = Auth::user();
        
            
                 if($user->hasRole('admin'))
                 return "admin";
                 else 
                 return "client";

        
        }
        else {
            return redirect()->route('login')->with(['message'=>'incorerct username or password ']);
        }

    }



    public function register(){

      

        $u=new User();
        $u->name='admin';
        $u->password=Hash::make('123456');
        $u->email='';
        if($u->save())
        return redirect()->route('/')
        ->with(['success'=>'user created successful']);
        return back()->with(['error'=>'can not create user']);

    }
    public function resetPassword(){

    }
    public function logout(){

        Auth::logout();
        return redirect()->route('login');

    }

    public function checkRole(){
        if(Auth::user()->hasRole('admin'))
        return 'dash';
            else 
            return '/';
        
    }




}