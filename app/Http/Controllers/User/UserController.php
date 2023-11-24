<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function create(Request $request){
          //Validate Inputs
          $request->validate([
              'name'=>'required',
              'email'=>'required|email|unique:users,email',
              'password'=>'required|min:5|max:30',
              'cpassword'=>'required|min:5|max:30|same:password'
          ]);

          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = \Hash::make($request->password);
          $save = $user->save();

          if( $save ){
              return redirect()->back()->with('success','You are now registered successfully');
          }else{
              return redirect()->back()->with('fail','Something went wrong, failed to register');
          }
    }

    function check(Request $request){
        //Validate inputs
        $request->validate([
           'email'=>'required|email|exists:users,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists on users table'
        ]);

        $creds = $request->only('email','password');
        if( Auth::guard('web')->attempt($creds) ){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail','Incorrect credentials');
        }
    }

    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }


    public function login(){
        return view('dashboard.user.login');
    }

    public function register(){
        return view('dashboard.user.register');
    }
    public function index(){
        return view('dashboard.user.home');
    }





    ///product///
    function product_index(){
        $s['products'] = product::all();
        return view('product.index',$s);

    }
    function product_create(){
        return view('product.create');
    }
    function store(Request $req){


        $insert = new product();
        if($req->hasFile('image')){
            $image = $req->file('image');
            $path = $image->store("products/$insert->id", 'public');
            $insert->image = $path;
        }



        $insert->name = $req->name;
        $insert->price = $req->price;
        $insert->save();

        return redirect()->route('user.product.index')->with('success','Data Insert Successfully.');


    }
    function edit($id){
        $s['product'] = product::findOrFail($id);

        return view('product.edit', $s);


    }

    function update(Request $req, $id){



        $product = product::findOrFail($id);

        if($req->hasFile('image')){
            $image = $req->file('image');
            $path = $image->store("products", 'public');
            $product->image = $path;
        }


        $product->name = $req->name;
        $product->price = $req->price;
         $product->update();

        return redirect()->route('user.product.index')->with('success','Data Insert Successfully.');

    }

    // delete function

    function delete($id){
        $product = product::findOrFail($id);
        $product->delete();

        return redirect()->back();

    }

}
