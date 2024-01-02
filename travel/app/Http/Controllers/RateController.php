<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Customer;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Customer;
use App\Models\Hotel;

class RateController extends Controller
{
   
    public function index()
    {

      $rate=Rate::all();
      $customer=Customer::all();
      $hotel=Hotel::all();
      return view('Rateform/Rindex',['rate'=>$rate,'customer'=>$customer,'hotel'=>$hotel]);


    }

    
    public function create()

    { 
        $customer=Customer::all();
        $hotel=Hotel::all();
        return view('Rateform.add',['customer'=>$customer],['hotel'=>$hotel]);

    }

    
    public function store(Request $request)
    {

        
        $v=validator::make($request->all(),[
            'star'=>'required||numeric|digits:1|min:1|max:5',
            'comment'=>'required|string',
            'customer_id'=>'required|exists:customers,id',
            'hotel_id'=>'required|exists:hotels,id',
             ] );

            if($v->fails()){
              //dd($v->errors());
              return $v->errors();
            }

            else{
              $data=new Rate;
              $data->star=$request->input('star');
              $data->comment=$request->input('comment');
              $data->customer_id=$request->input('customer_id');
              $data->hotel_id=$request->input('hotel_id');

              $data->save();
               return redirect()->route('Rate.index');
            }

    }

    
    public function show($id)
    {
        if(Rate::find($id)){
            $data=Rate::find($id);
            return view('Rateform.index',['data'=>$data]); }
    
            else{
                dd('This id is not found');
            }
    }

   
    public function edit($id)
    {
        if(Rate::find($id)){
        $customer=Customer::all();
         $hotel=Hotel::all();
       $rate=Rate::find($id);
       return view('Rateform.update',['hotel'=>$hotel],['rate'=>$rate,'customer'=>$customer]);}

       else{
           dd('This id is not found');
       }
    }

   
    public function update(Request $request, $id)
    {
        $v=validator::make($request->all(),[
            'star'=>'required||numeric|digits:1|min:1|max:5',
            'comment'=>'required|string',
            'customer_id'=>'required|exists:customers,id',
            'hotel_id'=>'required|exists:hotels,id',
             ] );

            if($v->fails()){
              //dd($v->errors());
              return $v->errors();
            }

            else{
                $data=Rate::find($id);
                $data->star=$request->input('star');
                $data->comment=$request->input('comment');
                $data->customer_id=$request->input('customer_id');
                $data->hotel_id=$request->input('hotel_id');

         $data->save();
         return redirect()->route('Rate.index');

        }
    }

    
    public function destroy($id)
    {
        if(Rate::find($id)){
            $data=Rate::find($id);
            $data->delete();
            return redirect()->route('Rate.index');}
    
            else{
                dd('This id is not found');
            }
    }
}
