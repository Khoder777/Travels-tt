<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Admin::all();
        return view('Userform.Userindex',['data'=>$data]);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Userform.Useradd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v=Validator::make($request->all(),
        [
            'name'=>'required|alpha',
            'email'=>'required|email|unique:users,email|max:255|ends_with:gmail.com',
            'password'=>'required|string'   
        ] );
            if($v->fails()){
              //dd($v->errors());
              return $v->errors();
                   }

            else{
              $data=new Admin;
              $data->name=$request->input('name');
              $data->email=$request->input('email');
              $data->password=$request->input('password');
              $data->save();
               
              return redirect()->route('User.index');
            }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin ,$id)
    {
    
        if(Admin::find($id)){
        $data=Admin::find($id);
        return view('Userform.Userindex',['data'=>$data]);}
        
        else{
            dd('This id is not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin,$id)
    { 
        if(Admin::find($id)){
        $User=Admin::find($id);
        return view('Userform.Userupdate',['User'=>$User]);}

        else{
            dd('This id is not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v=validator::make($request->all(),[
            'name'=>'required|alpha',
            'email'=>'required|max:255|ends_with:gmail.com',
            'password'=>'required|string'    
             ]);

        if($v->fails()) {
            dd($v->errors());
         return $v->errors();

           }

        else{
            $data=new Admin;
            $data->name=$request->input('name');
            $data->email=$request->input('email');
            $data->password=$request->input('password');
            $data->save();
              return redirect()->route('User.index');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Admin::find($id)){
            Admin::destroy($id);
        return redirect()->route('User.index');
    }

        else{
            dd('This id is not found');
        }
}
}
