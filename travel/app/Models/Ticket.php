<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table='tickets';

    protected $fillable = [
        'city_id',
        'company_id',
        'date_s',
        'date_e',
        

        
    ];

    protected $hidden = [
        'remember_token',
    ];

     protected $casts = [
       'city_id' => 'integer',
       'company_id' => 'integer',
        'date_s'=>'date',
        'date_e'=>'date',

     ];

     public function city() {
        return $this->belongsTo(City::class);
    }
    public function Company(){ 
        return $this->belongsTo(Company::class);
    }

}
