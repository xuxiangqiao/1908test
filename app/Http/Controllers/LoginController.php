<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Login;
use Validator;
use App\Http\Requests\StoreBlogPost;
class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function logindo(Request $request){
        //echo 123; die;
        $user=$request->except('_token');
       
        //$user['password']=md5(md5($user['password']));
      //  dd($user);
        $admin=Login::where($user)->first();
        //echo 123; die;
       //dd($admin);die;
        if($admin){
            session(['adminuser'=>$admin]);
            $request->session()->save();
            return redirect('/admin/creat');
        }
        return redirect('/login')->with('msg','没有此用户');
    }
  
}
