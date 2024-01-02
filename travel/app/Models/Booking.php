<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'ticket_id',
        'customer_id',
        'date',
    ];
    public function hotel() {
        return $this->belongsTo(Hotel::class);
    }
    public function ticket(){ 
        return $this->belongsTo(Ticket::class);
    }
    public function customer() { 
        return $this->belongsTo(Customer::class);
    }


}
