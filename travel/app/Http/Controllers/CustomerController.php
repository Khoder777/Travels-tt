<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=Customer::all();
        return view('customers/customer-index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers/customer-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'name' => 'required|string',
        'email' => 'required|string|email|unique:customers',
        'gender' => 'required|string|in:m,f,M,F',
        'phone' => 'required|string|',
    ]);
    if($validator->fails())
        {
            dd('your input is wrong');

        }
    // Create a new customer instance
    $c = new Customer;
    $c->name = $request->name;
    $c->email = $request->email;
    $c->gender = $request->gender;
    $c->phone = $request->phone;
    $c->save();
    return redirect()->route('index');

    // Further code logic...

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
          $customer=Customer::find($id);
        return view('customers/customer-edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'email' => 'required|string|email|max:255|unique:customers,email,'.$id,
            'gender' => 'required|string|in:m,f,M,F',
            'phone' => 'required|string|regex:/^09\d{8}$/',
        ]);
        if($validator->fails())
        {
          return response($validator->messages());

        }
        $c = Customer::find($id);
        $c->name = $request->name;
        $c->email = $request->email;
        $c->gender = $request->gender;
        $c->phone = $request->phone;
        $c->save();
          
        return redirect()->route('index');
        //     ->with('success', 'customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function confirm(Customer $customer, $id)
{
    return view('customers/customer-delete', compact('id'));
}

public function destroy(Customer $customer,$id)
{
  
    Customer::where('id',$id)->delete();
  
    
    return redirect()->route('index');
} 
}
