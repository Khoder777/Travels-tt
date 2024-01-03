<?php

namespace App\Http\Controllers;
use illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class Usercontroller extends Controller
{
    public function edit()
    { 
       $id=Auth::id();
          $User=User::find($id);
        return view('Users/User-edit', compact('User'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:Users,email,'.$id,

        ]);
        if($validator->fails())
        {
          return response($validator->messages());

        }
        $c = User::find($id);
        $c->name = $request->name;
        $c->email = $request->email;

        $c->save();
          
        return redirect()->route('index');
        //     ->with('success', 'User updated successfully.');
    }
    public function pass(Request $request)
{
    $validator = Validator::make($request->all(), [
        'password' => 'required|string|min:8',
        'newpassword' => 'required|string|min:8',
        'confirmpassword' => 'required|string|min:8|same:newpassword',
    ]);
    
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    
    $user = User::find(Auth::id());
    $hashedPassword = $user->password;
    
    if (Hash::check($request->password, $hashedPassword)) {
        $user->password = Hash::make($request->newpassword);
        $user->save();
        return redirect()->route('home');
    }
    
    return redirect()->back()->withErrors(['password' => 'Invalid password.']);
}
    
}
