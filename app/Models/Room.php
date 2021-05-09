<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['residence_id', 'type', 'attached_bathroom', 'attached_balcony'];

    public function residence(){
        $this->belongsTo(Residence::class);
    }


}
