<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Facades\Validator;

use App\Models\Company;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;


class TicketController extends Controller
{
    
    public function index()
    {
        $data = Ticket::all();
        $city = City::all();
        $company = Company::all();
        return view('Ticketform.ticketindex',['data'=>$data,'company'=>$company,'city'=>$city]);

    }

    public function create()
    {
        $city=City::all();
        $company=Company::all();
        return view('Ticketform.Tadd',['city'=>$city],['company'=>$company]);
    }

    
    public function store(Request $request)
    {
        $v=validator::make($request->all(),[
            'city_id'=>'required|exists:cities,id',
            'company_id'=>'required|exists:companies,id',
            'date_s'=>'required|date',
            'date_e'=>'required|date',
         
              
             ] );

            if($v->fails()){
              //dd($v->errors());
              return $v->errors();
            }

            else{
              $data=new Ticket;
              $data->city_id=$request->input('city_id');
              $data->company_id=$request->input('company_id');
              $data->date_s=$request->input('date_s');
              $data->date_e=$request->input('date_e');

              $data->save();
               return redirect()->route('ticket.index');
            }
    }

    

    public function show($id)
    {
        if(Ticket::find($id)){
            $data=Ticket::find($id);
            return view('Ticketform.ticketindex',['data'=>$data]); }
    
            else{
                dd('This id is not found');
            }
    }


    public function edit($id)
    {
        if(Ticket::find($id)){
            $city=City::all();
           $company=Company::all();
           $tickets=Ticket::find($id);
           return view('Ticketform.Tupdate',['company'=>$company],['tickets'=>$tickets,'city'=>$city]);}
   
           else{
               dd('This id is not found');
           }
    }


    public function update(Request $request, $id)
    {
        
        $v=validator::make($request->all(),[
            'city_id'=>'required|exists:cities,id',
            'company_id'=>'required|exists:companies,id',
            'date_s'=>'required|date',
            'date_e'=>'required|date',
         
              
             ] );

            if($v->fails()){
              //dd($v->errors());
              return $v->errors();
            }

            else{
                $data=Ticket::find($id);
              $data->city_id=$request->input('city_id');
              $data->company_id=$request->input('company_id');
              $data->date_s=$request->input('date_s');
              $data->date_e=$request->input('date_e');

         $data->save();
         return redirect()->route('ticket.index');

        }
    }

    public function destroy($id)
    {
        if(Ticket::find($id)){
            $data=Ticket::find($id);
            $data->delete();
            return redirect()->route('ticket.index');}
    
            else{
                dd('This id is not found');
            }
    }
}
