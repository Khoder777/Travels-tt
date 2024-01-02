<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $validatedData = Validator::make($request->all(),[
            'name' => 'required|alpha',
            'phone' => 'required|regex:([0-9])|not_regex:([a-z])|min:10',
        ]);
        if ($validatedData->fails()) {
        return $validatedData->errors();
        }
        else {
            Company::create(['name'=>$request->name,'phone'=>$request->phone]);
             return redirect("company/show");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
   
    public function show (Company $company){
        /* return Company::get(); */
        $company= $company->all();
        return view("companies/show",['company'=>$company]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company,$id)
    {
        //
        $company = $company->find($id);
        return view("companies/update",compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
        $validatedData = Validator::make($request->all(),[
            'id'=> "required|exists:companies,id|min:1",
            'name' => 'required|alpha',
            'phone' => 'required|regex:(0-9)|not_regex:(a-z)|min:9',
        ]);
        if ($validatedData->fails()) {
        return $validatedData->errors();
        }
        else {
        $company = $company->find($request->id);
        $date = [
            'name'=> $request->name,
            'phone'=> $request->phone,
        ];
        $company->t($date);
        return redirect("company/show");

        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company,Request $request)
    {
        //
        $company= $company->find($request->id);
        $company->destroy($request->id);
        return redirect("company/show"); 
    }
}
