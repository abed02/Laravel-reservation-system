<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function assign_rooms(){
        return $this->hasMany(bookingRoomList::class,"booking_id");
    }
    public function user(){//access user name by foreign key in booking table 
        return $this->belongsTo(User::class);
    }

    public function room(){//access user name by foreign key in booking table 
        return $this->belongsTo(Room::class,'rooms_id','id');
    }

    
}
