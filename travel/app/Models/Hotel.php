<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $table='hotels';

    protected $fillable = [
        'name',
        'phone',
        'city_id',
        
    ];

    protected $hidden = [
        'remember_token',
    ];

     protected $casts = [
       'name' => 'string',
       'phone' => 'string',
       'city_id' => 'integer',
     ];

     public function city():object{
        return $this->belongsTo(City::class);
      }
}
