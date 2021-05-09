<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    use HasFactory;

    protected $fillable=['type', 'category', 'owner_id', 'property_size', 'facing' ,'floor_no', 'floor_type', 'dining_type', 'price', 'service_charge', 'available_from', 'preferred_rental', 'details', 'image', 'district', 'area', 'sector', 'road', 'house', 'cctv', 'electricity_included', 'gas','gas_included', 'generator', 'guard', 'lift', 'negotiable', 'parking', 'wifi'];

    public function rooms(){
        return $this->hasMany(Room::class);
    }

//    public function owner(){
//        return $this->hasOne(User::class);
//    }
}
