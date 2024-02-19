<?php

namespace App\Http\Controllers\Fronend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;




class BookingDetailsController extends Controller
{
    //
    public function UserBooking () {
        $id = Auth::user()->id;
        $allData = Booking::where('user_id',$id)->orderBy('id','desc')->get() ;

        return view ('frontend.dashboard.user_booking',compact('allData'));
    }

    public function UserInvoice($id){

        $editData = Booking::with('room')->find($id);
        $pdf = Pdf::loadView('backend.booking.booking_invoice',compact('editData'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');

     }// End Method 

}
