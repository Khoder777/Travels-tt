<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Hotel;
use App\Models\City;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Validation\Rule;


class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        $cities = City::all();
        return view('Hotelform.hotelindex',['hotels'=>$hotels,'cities'=>$cities]);

    }

    public function create()
    {
        $city=City::all();
        return view('Hotelform.Hadd',['city'=>$city]);
       
    }

    public function store(Request $request)
    {
            
        $v=validator::make($request->all(),[
            'city_id'=>'required|exists:cities,id',
            'name'=>'required|alpha',
            'phone'=>'required|unique:hotels,phone|numeric|digits:10'      
              
             ] );

            if($v->fails()){
              //dd($v->errors());
              return $v->errors();
            }

            else{
              $data=new Hotel;
              $data->city_id=$request->input('city_id');
              $data->name=$request->input('name');
              $data->phone=$request->input('phone');
              $data->save();
               return redirect()->route('hotel.index');
            }
    }

    public function show($id)
    {
        if(Hotel::find($id)){
        $data=Hotel::find($id);
        return view('Hotelform.hotelindex',['data'=>$data]); }

        else{
            dd('This id is not found');
        }

    }

    public function edit($id)
    {

        if(Hotel::find($id)){
         $city=City::all();
        $hotels=Hotel::find($id);
        return view('Hotelform.Hupdate',['hotels'=>$hotels],['city'=>$city]);}

        else{
            dd('This id is not found');
        }
    }

   
    public function update(Request $request,$id)
    {$data=Hotel::find($id);
        $v=validator::make($request->all(),[

            'city_id'=>'required|exists:cities,id',
            'name'=>'required|alpha',
            'phone'=>['required','numeric','digits:10',Rule::unique('hotels','phone')->ignore( $data->phone,'phone')],      
         ] );

        if($v->fails()) {
         // dd($v->errors());
         return $v->errors();  }

        else{
        $data=Hotel::find($id);
        $data->city_id=$request->input('city_id');
        $data->name=$request->input('name');
         $data->phone=$request->input('phone');
         $data->save();
         return redirect()->route('hotel.index');

        }
    }

    public function destroy($id)
    {
        if(Hotel::find($id)){
        $data=Hotel::find($id);
        $data->delete();
        return redirect()->route('hotel.index');}

        else{
            dd('This id is not found');
        }

    }
}

