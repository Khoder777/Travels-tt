<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Hotel;
use App\Models\Ticket;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Type\Integer;

class BookingController extends Controller
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
        $hotel=Hotel::get();
        $customer=Customer::get();
        $ticket=Ticket::get();
        return view('bookings/add',['hotel'=>$hotel,"ticket"=>$ticket,"customer"=>$customer]);
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
            'hotel_id' => 'required|string|exists:hotels,id',
            'ticket_id' => 'required|string|exists:tickets,id',
            'customer_id' => 'required|string|exists:customers,id',
            'date'=> 'required|'
        ]);
        if ($validatedData->fails()) {
        return $validatedData->errors();
        }
        else {
            Booking::create(['date'=>$request->date,
            'customer_id'=>$request->customer_id,
             'hotel_id'=>$request->hotel_id,
             'ticket_id'=>$request->ticket_id,
        ]);
        return redirect("booking/show");
        }


        return redirect("booking/show"); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        $booking= $booking->all();
        return view("bookings/show",['booking'=>$booking]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking,Request $request,$id)
    {
        //
        $id = (int)$id;
        if (Booking::find($id)) {
            $booking = $booking->find($id);
            return view("bookings/update",[ "booking"=>$booking]);
        }
        else {
            dd('This id is not found');
        }   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
        $validatedData = Validator::make($request->all(),[
            'hotel_id' => 'required|string|exists:hotels,id',
            'ticket_id' => 'required|string|exists:tickets,id',
            'customer_id' => 'required|string|exists:customers,id',
            'date'=> 'required|'
        ]);
        if ($validatedData->fails()) {
        return $validatedData->errors();
        }
        else {
            $booking = $booking->find($request->id);
             $date = [
            'date'=> $request->date,
            'hotel_id'=> $request->hotel_id,
            'ticket_id'=> $request->ticket_id,
            'customer_id'=> $request->customer_id,
        ];
        $booking->update($date);
        return redirect("booking/show");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking,Request $request)
    {
        //
        $booking= $booking->find($request->id);
        $booking->destroy($request->id);
        return redirect("booking/show"); 
    }
}
