<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
 use Illuminate\Http\Request;
use App\Models\City;


class CityController extends Controller
{
    public function index()
    {
        $data=City::all();
        return view('Cityform.cityindex',['data'=>$data]);
    }

    public function create()
    {

        return view('Cityform.cityadd');
    }

   
    public function store(Request $request)
    {
        $v=validator::make($request->all(),
        [
            'name'=>'required|alpha',
            'country'=>'required|alpha'   
        ] );
            if($v->fails()){
              //dd($v->errors());
              return $v->errors();
                   }

            else{
              $data=new City;
              $data->name=$request->input('name');
              $data->country=$request->input('country');
              $data->save();
               
              return redirect()->route('City.index');
            }
        
    }

    
    public function show($id)
    {
    
        if(City::find($id)){
        $data=City::find($id);
        return view('Cityform.cityindex',['data'=>$data]);}
        
        else{
            dd('This id is not found');
        }
    }

   
    public function edit($id)
    { 
        if(City::find($id)){
        $city=City::find($id);
        return view('Cityform.cityupdate',['city'=>$city]);}

        else{
            dd('This id is not found');
        }
    }

    public function update(Request $request, $id)
    {
        $v=validator::make($request->all(),[
            'name'=>'required|alpha',
            'country'=>'required|alpha' ,     
             ]);

         if($v->fails()) {
          //dd($v->errors());
          return $v->errors();

           }

        else{
              $city=City::find($id);
              $city->name=$request->input('name');
              $city->country=$request->input('country');
              $city->save();
              return redirect()->route('City.index');

        }
    }

    public function destroy($id)
    {
        if(City::find($id)){
        City::destroy($id);
        return redirect()->route('City.index');
    }

        else{
            dd('This id is not found');
        }

    }
}
