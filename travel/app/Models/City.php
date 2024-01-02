<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table='cities';

    protected $fillable = [
        'name',
        'country',
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
    'name' => 'string',
    'country' => 'string',
    ];


    public function Hotels():object{
        return $this->hasMany(Hotel::class);
      }

}
