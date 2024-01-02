<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $table='rates';

    protected $fillable = [
        'star',
        'commeny',
        'customer_id',
        'hotel_id',
        
    ];

    protected $hidden = [
        'remember_token',
    ];

     protected $casts = [
        'star'=>'integer',
        'comment'=>'string',
        'customer_id'=>'integer',
        'hotel_id'=>'integer',

     ];

     public function hotel() {
        return $this->belongsTo(Hotel::class);
    }
    public function customer(){ 
        return $this->belongsTo(Customer::class);
    }


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
