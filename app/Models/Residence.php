<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    use HasFactory;

    protected $fillable=['type', 'category', 'owner_id', 'location', 'size', 'facing' ,'floor_no', 'floor_type', 'dinning_type', 'price', 'service_charge', 'price_options', 'available_from', 'preferred_rental', 'details', 'other_facilities', 'image'];

    public function rooms(){
        return $this->hasMany(Room::class);
    }

//    public function owner(){
//        return $this->hasOne(User::class);
//    }
}
