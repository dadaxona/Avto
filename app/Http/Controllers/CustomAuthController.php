<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ScoolController;
use Illuminate\Http\Request;
use App\Models\Brend;
use App\Models\Admin;
use App\Models\Drektor;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends ScoolController
{
  public function login()
  {
    return view("auth.login");
  }
  
  public function loginuser(Request $req)
  {
    if($req->login == "glovni"){
    $user = Drektor::where('login','=',$req['login'])->first();
    if($user){
      $user = Drektor::where('login','=',$req->login)->first();    
      if($req->login == "glovni" && $req->password == $user->password){            
            $req->session()->put('IDIE',$user->id);
            return redirect('/glavninachal');             
        }else{
          return back()->with('not','Parolingiz Xato');
        }

    }else{
      $req->validate([
        'login'=>'required',
        'password'=>'required',
      ]);  
      $user = new Drektor();
      $user->login = $req['login'];
      $user->password = $req['password'];
      $user->save();      
      $user = Drektor::where('login','=',$req['login'])->first();
      if ($user) {         
          $req->session()->put('IDIE',$user->id);
          return redirect('/glavninachal');          
      }
    }

  }elseif($req->login == "admin"){
      $user = Admin::where('login','=',$req['login'])->first();
        if($user){
          $user = Admin::where('login','=',$req->login)->first();    
          if($req->login == "admin" && $req->password == $user->password){            
                $req->session()->put('ID',$user->id);
                return redirect('/admin');             
            }else{
              return back()->with('not','Parolingiz Xato');
            }

        }else{
          $req->validate([
            'login'=>'required',
            'password'=>'required',
          ]);  
          $user = new Admin();
          $user->login = $req['login'];
          $user->password = $req['password'];
          $user->save();      
          $user = Admin::where('login','=',$req['login'])->first();
          if ($user) {         
              $req->session()->put('ID',$user->id);
              return redirect('/admin');          
          }
        }

    }elseif($req->login == "bugalter"){
      $user = Brend::where('login','=',$req['login'])->first();
      if($user){
        $user = Brend::where('login','=',$req->login)->first();    
        if($req->login == "bugalter" && $req->password == $user->password){        
              $req->session()->put('loginID',$user->id);
              return redirect('/dashbord');          
          }else{
            return back()->with('not','Parolingiz Xato');
        }
      }else{
        $req->validate([
          'login'=>'required',
          'password'=>'required',
        ]);  
        $user = new Brend();
        $user->login = $req['login'];
        $user->password = $req['password'];
        $user->save();      
        $user = Brend::where('login','=',$req['login'])->first();
        if ($user) {         
          $req->session()->put('loginID',$user->id);
          return redirect('/dashbord');          
        }
      }   
    }
  }
  
  public function logaut()
  {
    if(Session::has('IDIE')){
      Session::pull('IDIE');
      return redirect('/');
    }elseif(Session::has('loginID')) {
      Session::pull('loginID');
      return redirect('/');
   }elseif(Session::has('ID')){
      Session::pull('ID');
      return redirect('/');
    }
  }
    public function logindrekror()
    {
      return view('drektor.loginoyna');
    }
    public function paroldrekror(Request $request)
    {
      $request->validate([
        'password'=>'required',
        'passwordconfirm'=>'required_with:password|same:password',
      ]);
      Drektor::where('id', 1)->update([
        'password'=>$request->password
      ]);
      return back()->with('success', 'Parolingiz muvofaqiyatli yangilandi');
    }

    public function loginbugalter()
    {
      return view('publis.loginoyna');
    }

    public function bugalterparol(Request $request)
    {
      $request->validate([
        'password'=>'required',
        'passwordconfirm'=>'required_with:password|same:password',
      ]);
      Brend::where('id', 1)->update([
        'password'=>$request->password
      ]);
      return back()->with('success', 'Parolingiz muvofaqiyatli yangilandi');
    }
    public function loginadmin()
    {
      return view('admin.loginoyna');
    }

    public function adminparol(Request $request)
    {
      $request->validate([
        'password'=>'required',
        'passwordconfirm'=>'required_with:password|same:password',
      ]);
      Admin::where('id', 1)->update([
        'password'=>$request->password
      ]);
      return back()->with('success', 'Parolingiz muvofaqiyatli yangilandi');
    }
}
