<?php

namespace App\Http\Controllers\Fronend;

use App\Http\Controllers\Controller;
use App\Mail\bookConfirm;
use App\Models\bookingRoomList;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use App\Models\Room;
use App\Models\MultiImages;
use App\Models\Facility;
use App\Models\Booking;

use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\RoomBookedDate;
use App\Models\RoomNumber;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Notifications\BookingComplete;
use Illuminate\Support\Facades\Notification;
use DB;





class BookingController extends Controller
{
    //
    public function Checkout() { 

        if(Session::has("book_date")) {

            $book_data = Session::get("book_date");
            $room =Room::find($book_data["room_id"]);

            $toDate=Carbon::parse($book_data["check_in"]);
            $fromDate=Carbon::parse($book_data["check_out"]);
            $nights =$toDate->diffInDays($fromDate);

            return view("frontend.checkout.checkout",compact("book_data","room","nights"));
        } else {
            $notification =array (
                "messsage"=> "Sonthing Wrong",
                "alert-type"=> "error",
            );
            return redirect('/')->with($notification);

        } //End else 
       

    }//End menthod 

    public function BookingStore(Request $request){
        $validateDate = $request ->validate ([
            "check_in"=> "required",
            "check_out"=> "required",
            "person"=> "required",
            "number_of_rooms"=> "required",
        ]);

        if ($request->available_room < $request->number_of_rooms  ) {
            $notification =array (
                "messsage"=> "Sonthing Wrong",
                "alert-type"=> "error",
            );
            return redirect()->back()->with($notification);
            

        }//End If

        Session::forget("book_date");  //remove all from session //?
        
        $data = array();

        $data["number_of_rooms"] = $request->number_of_rooms;
        $data["available_room"] = $request->available_room;
        $data["person"] = $request->person;
        $data["check_in"] = date('Y-m-d',strtotime($request->check_in));
        $data["check_out"] = date('Y-m-d',strtotime($request->check_out));
        $data['room_id'] = $request->room_id;

        Session::put('book_date',$data); // add to session

        return redirect()->route('checkout');

    }// End Method 

    public function CheckoutStore(Request $request){

        $user_role = User::where('role','admin')->get();

       // dd(env('STRIPE_SECRET')); 
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'state'=>'required',
            'zip_code'=>'required',
            'payment_method'=>'required',
        ]);

        $book_data = Session::get("book_date");
        $toDate=Carbon::parse($book_data["check_in"]);
        $fromDate=Carbon::parse($book_data["check_out"]);
        $total_nights =$toDate->diffInDays($fromDate);

        //find the room
        $room =Room::find($book_data["room_id"]);
       
        $subtotal =  $room->price * $total_nights *$book_data['number_of_rooms'] ;
        $discount = ($room->discount/100) *$subtotal;
        $total_price = $subtotal - $discount;

        $code = rand(000000000,999999999);

        if($request->payment_method =='Stripe')
        {
            Stripe\Stripe::setApiKey('sk_test_51OCTfOGqbEhzanqvZrYb7i8rAucSdgUUkAptwXzmZlGKMT6WTjud20mYn8BkmrBqZy5dICZUBcp6JbtrsGNmSgXr00m5zVVghI');
            $s_pay = Stripe\Charge::create([
                "amount" => $total_price *100,
                "currency"=>'usd',
                'source'=> $request->stripeToken,
                "description" => ' payment for booking  code :'.$code
             ]);
             if($s_pay['status'] == 'succeeded'){
                $payment_status= 1;
                $transation_id= $s_pay->id;
             }else{
                $notification =array (
                    "message"=> "Sorry payment  Field",
                    "alert-type"=> "error",
                );
                return redirect('/')->with($notification);

             } //End else

        }else{
            $payment_status= 0;
            $transation_id= '';

        }

        $data = new Booking();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->code=$code;
        $data->status=  0 ;
        $data->created_at=Carbon::now();

        $data->rooms_id= $room->id; //foreign
        $data->user_id= Auth::user()->id;//foreign
        $data->check_in=date('Y-m-d',strtotime($book_data['check_in']));
        $data->check_out=date('Y-m-d',strtotime($book_data['check_out']));
        $data->person = $book_data['person'];
        $data->number_of_rooms = $book_data['number_of_rooms'];

        $data->total_night =$total_nights;
        $data->actual_price= $room->price;
        $data->subtotal= $subtotal;
        $data->discount= $discount;
        $data->total_price = $total_price;
        $data->payment_method=$request->payment_method ;
        $data->payment_status = 0;

        $data->save();
        //insert to room_booked_ dates 
        $start_data = date('Y-m-d',strtotime($book_data['check_in']));
        $end_data = date('Y-m-d',strtotime($book_data['check_out']));
        $eldata = Carbon::create($end_data)->subDay();

        $d_period =CarbonPeriod::create($start_data,$eldata);
        foreach( $d_period as $period ){
            $booked_dates  = new RoomBookedDate();
            $booked_dates->booking_id =$data->id ;
            $booked_dates->room_id = $room->id;
            $booked_dates->book_date =date('Y-m-d',strtotime($period));
            $booked_dates->save();

        }//End foreach

        Session::forget('book-date');




        $notification =array (
            "message"=> "Booking Add Successfully",
            "alert-type"=> "success",
        );

                //Send notification 
        Notification::send($user_role, new BookingComplete ($request->name) );
        return redirect('/')->with($notification);


    } // End method 


     //         =========================================       BookingList                    ========================
    
     public function BookingList(){
        $allData = Booking::orderBy('id','desc')->get();
        return view('backend.booking.booking_list',compact('allData'));
     } // end method
     public function EditBooking($id) {
        $editData = Booking::with('room')->find($id);
        return view('backend.booking.edit_booking',compact('editData'));


     }//end method 

     public function UpdateBookingStatus(Request $request ,$id) {
        
        $booking =Booking::find($id);

        $booking->status = $request->status;
        $booking->payment_status = $request->payment_status;
        $booking->save();
        // send email 
        $sendmail = Booking::find($id);

        $maildata = [
            'check_in'  => $sendmail->check_in ,
            'check_out' => $sendmail->check_out,
            'name'      =>$sendmail->name ,
            'phone'      =>$sendmail->phone ,
            'email'     =>$sendmail->email
        ];
        Mail::to($sendmail->email)->send( new bookConfirm($maildata));
        
        $notification =array (
            "message"=> "Information updated Successfully",
            "alert-type"=> "success",
        );
        return redirect()->back()->with($notification);

     }//End Method 

     
     public function UpdateBooking(Request $request, $id) {

        if($request->available_room  < $request->number_of_rooms) {

            $notification =array (
                "message"=> "Somthing Wrong",
                "alert-type"=> "error",
            );
            return redirect()->back()->with($notification);
    
        }

        $data = Booking::find($id);
        $data->number_of_rooms = $request->number_of_rooms;
        $data->check_in = date('Y-m-d', strtotime($request->check_in));
        $data->check_out = date('Y-m-d', strtotime($request->check_out));

        $toDate=Carbon::parse($request->check_in);
        $fromDate=Carbon::parse($request->check_out);
        $total_nights =$toDate->diffInDays($fromDate);


        $data->total_night = $total_nights;
        $data->save();

        
        RoomBookedDate::where('booking_id', $id)->delete();
        bookingRoomList::where('booking_id', $id)->delete();



        $sdate = date('Y-m-d',strtotime($request->check_in));
        $edate = date('Y-m-d',strtotime($request->check_out));
        $eldate = Carbon::create($edate)->subDay();
        $d_period = CarbonPeriod::create($sdate,$eldate);
        foreach ($d_period as $period) {
            $booked_dates = new RoomBookedDate();
            $booked_dates->booking_id = $data->id;
            $booked_dates->room_id = $data->rooms_id;
            $booked_dates->book_date = date('Y-m-d', strtotime($period));
            $booked_dates->save();
        }

        $notification =array (
            "message"=> "Booking Updated successfully",
            "alert-type"=> "success",
        );
        return redirect()->back()->with($notification);

     }// End Method 
     //for ASsign room from admin dashboard
     public function AssignRoom($booking_id){

        $booking = Booking::find($booking_id);

        $booking_date_array =RoomBookedDate::where("booking_id", $booking_id)->pluck("book_date")->toArray();

        $check_date_Booking_ids =RoomBookedDate::whereIn("book_date", $booking_date_array)
        ->where("room_id", $booking->rooms_id)->distinct()->pluck("booking_id")->toArray();

        $booking_ids = Booking::whereIn("id", $check_date_Booking_ids)->pluck("id")->toArray();

        $assign_room_ids = BookingRoomList::whereIn('booking_id',$booking_ids)->pluck('room_number_id')->toArray();

        

        
        $room_number = RoomNumber::where('rooms_id',$booking->rooms_id)->whereNotIn('id',$assign_room_ids)
        ->where('status','Active')->get();

        return view('backend.booking.assign_room',compact('booking','room_number'));

     }//End method 

     public function AssignRoomStore($booking_id , $room_number_id ,$room_no){
        $booking = Booking::find($booking_id);
        $check_data = BookingRoomList::where('booking_id', $booking_id)->count();

        if($check_data < $booking->number_of_rooms)
        {
            $assign_data = new  BookingRoomList ();

            $assign_data->booking_id = $booking_id;
            $assign_data->room_id  =$booking->rooms_id;
            $assign_data->room_number_id =$room_number_id ;
            $assign_data->save();


            DB::table('room_numbers')
            ->where('room_no', $room_no)
            ->update(['status' => 'reserved']);
          


            $notification =array (
                "message"=> "Room  Assign  successfully",
                "alert-type"=> "success",
            );
            return redirect()->back()->with($notification);
        }else{
            $notification =array (
                "message"=> "Room Already Assign  ",
                "alert-type"=> "error",
            );
            return redirect()->back()->with($notification);
        } 

     }//End method 
     
     public function AssignRoomDelete($id){

        $assign_room = bookingRoomList::find($id);
        $assign_room->delete();

        $notification = array(
            'message' => 'Assign Room Deleted Successfully',
            'alert-type' => 'success'
        ); 
        return redirect()->back()->with($notification); 

     }//End method DownloadInovice


     public function DownloadInovice($id)
     {
        $editData = Booking::with('room')->find($id);
        $pdf = Pdf::loadView('backend.booking.booking_invoice', compact('editData'))
        ->setPaper('a4')->setOption([
            'tempDir'=> public_path(),
            'chroot'=>public_path()
        ]);
        return $pdf->download('invoice.pdf');
     } // end method 

     public function MarkAsRead (Request $request,$notifcationId)
     {
        $user =Auth::user();
        $notification = $user->notifications()->where('id',$notifcationId)->first();

        if($notification) {
            $notification->MarkASRead();
        }
        return response()->json(['count' => $user->unreadNotifications()->count() ]);

     }//end method 

}
