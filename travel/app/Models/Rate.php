<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'customer_id',
        'comment',
        'star',
    ];
    public function hotel() {
        return $this->belongsTo(Hotel::class);
    }
    public function customer() { 
        return $this->belongsTo(Customer::class);
    }

}
