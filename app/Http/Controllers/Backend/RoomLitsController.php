<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bookingRoomList;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Session;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Support\Carbon;
use App\Models\RoomBookedDate;
use App\Models\RoomNumber;
use App\Models\RoomType;

use Illuminate\Support\Facades\Auth;
use Stripe;

class RoomLitsController extends Controller
{
    //
     public function ViewRoomList () {
        //This section 23 partt 2 17:min
        $room_number_list = Room::join('room_numbers', 'room_numbers.rooms_id', '=', 'rooms.id')
        ->select('image' ,'room_numbers.id','rooms.roomtype', 'room_numbers.room_no', 'room_numbers.status')
        ->get();
        

        return view('backend.allroom.rooms.show_rooms',compact('room_number_list'));

 
    }//End method 
    public function AddRoomList()
    {
        $room_type = Room::all();
        return view('backend.booking.addbooking',compact('room_type'));
    }  //End Method 

    public function StoreRoomList(Request $request) {

        if($request->check_in == $request->check_out) {

            $request->flash();

            $notification =array (
                "message"=> "Check the date ",
                "alert-type"=> "error",
            );
            return redirect()->back()->with($notification);
    

        }

        if($request->available_room < $request->numbers_of_rooms) {
            $request->flash();
            $notification =array (
                "message"=> " Check the room availibalty ",
                "alert-type"=> "error",
            );
            return redirect()->back()->with($notification);
    

        }

        $room = Room::find($request->room_id);

        if ($request->number_of_person  > $room->room_capacity){

            $request->flash();
            $notification =array (
                "message"=> " Check Number of guest ",
                "alert-type"=> "error",
            );
            return redirect()->back()->with($notification);

        }

        $toDate=Carbon::parse($request["check_in"]);
        $fromDate=Carbon::parse($request["check_out"]);
        $total_nights =$toDate->diffInDays($fromDate);

        //find the room
       
        $subtotal =  $room->price * $total_nights * $request->number_of_rooms ;
        $discount = ($room->discount/100) * $subtotal;
        $total_price = $subtotal - $discount;

        $code = rand(000000000,999999999);


        $data = new Booking();
        $data->rooms_id= $room->id; //foreign
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->code=$code;
        $data->status=  0 ;
        $data->created_at=Carbon::now();


        $data->user_id= Auth::user()->id;//foreign
        $data->check_in=date('Y-m-d',strtotime($request['check_in']));
        $data->check_out=date('Y-m-d',strtotime($request['check_out']));
        $data->person = $request->number_of_person;
        $data->number_of_rooms = $request->numbers_of_rooms;

        $data->total_night =$total_nights;
        $data->actual_price= $room->price;
        $data->subtotal= $subtotal;
        $data->discount= $discount;
        $data->total_price = $total_price;
        $data->payment_method='COD';
        $data->payment_status = 1;

        $data->save();
        //insert to room_booked_ dates 

        //insert to room_booked_ dates 

        $start_data = date('Y-m-d',strtotime($request['check_in']));
        $end_data = date('Y-m-d',strtotime($request['check_out']));
        $eldata = Carbon::create($end_data)->subDay();

        $d_period =CarbonPeriod::create($start_data,$eldata);
        foreach( $d_period as $period ){
            $booked_dates  = new RoomBookedDate();
            $booked_dates->booking_id =$data->id ;
            $booked_dates->room_id = $room->id;
            $booked_dates->book_date =date('Y-m-d',strtotime($period));
            $booked_dates->save();
        }
        //End foreach

        $notification =array (
            "message"=> "Booking Add Successfully",
            "alert-type"=> "success",
        );
        return redirect()->back()->with($notification);


    }
}
  
