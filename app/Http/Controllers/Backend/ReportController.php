<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use App\Models\Booking;

use Illuminate\Support\Facades\Auth;
use Stripe;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    //
    public function BookingReport ()
    {
        return view ('backend.report.booking_report');
    } //End method 

    public function SearchBydate(Request $request) 
    {
        $startDate  = $request->start_date;
        $endDate  = $request->end_date;

        $bookings=Booking::where('check_in','>=',$startDate)->where('check_out','<=',$endDate)->get();
        return view ('backend.report.booking_search_date',compact('startDate','endDate','bookings'));

    }
}
