<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class UserController extends Controller
{
    public function getRegister(){
        return view('users.register');
    }
    
    public function postRegister(Request $request){
        //validate user input
        $this->validate($request, [
            "email" => "required|email|unique:users",
            "name" => "required|max:120",
            "password" => "required|min:4|confirmed",
        ]);
        
        
        $email = $request['email'];
        $name = $request['name'];
        //encrypt password, you can use the bcrypt() built-in function
        $password = password_hash($request['password'], PASSWORD_DEFAULT);
       
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        //write to database
        if($user->save()){
            $message = "User Registered Successfully!";
            return redirect()->route('user.list')->with(['message' => $message]);
        }
    }
    
    public function postSignIn(Request $request){
        //validate login information 
        $this->validate($request, [
            "email" => "bail|required",
            "password" => "required"
        ]);
        
        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
           return redirect()->route('dashboard'); 
        }else{
            $message = "incorrect email or password";
            return redirect()->back()->with(['message' => $message]);
        }
    }
    
    public function getLogout(){
        Auth::logout();
        //redirect to the dashboard, this will automatically redirect to login
        return redirect()->route('dashboard');
    }
    
    public function getUserList(){
        
        $users =User::orderBy('created_at', 'desc')->get();
        return view('users.list', ['users' => $users]);
    }
    
    public function getEdit($id){
        $user = User::findorfail($id);
        return view('users.edit', [ 'user' => $user ]);
    } 
    
    public function postEdit(Request $request){
        $this->validate($request, [
            "name" => "required",
            "email" => "required|email",
            "password" => "required|confirmed",
        ]);
        
        $user = User::find($request['user_id']);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = password_hash($request['password'], PASSWORD_DEFAULT); //encrypt password, you can use the bcrypt() built-in function
        
        $message = "There Were Errors";
        
        if($user->save()){
            $message = "User Edited Successfully!";
            return redirect()->route('user.list')->with(['message' => $message]);
        }
    }
    
    public function getDelete($id){
        //we dont wanna delete the first/initial user
        $message = "There Were Errors";
        if($id == 1){
            $message = "Can't Delete This User Account!";
        }elseif(User::destroy($id)){
            $message = "User Deleted Succesfully!";
        }
        
        return redirect()->route('user.list')->with(['message' => $message]);
    }
}
