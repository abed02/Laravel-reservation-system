<?php

namespace App\Console\Commands;
use Carbon\Carbon;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateRoomAvalabilityCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-room-avalability-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $currentDate = Carbon::now();

        // Get booking end dates that are in the past
        $expiredBookings = DB::table('bookings')
            ->where('check_out', '<=', $currentDate)
            ->join('booking_room_lists', 'bookings.id', '=', 'booking_room_lists.booking_id')
            ->join('room_numbers', 'booking_room_lists.room_number_id', '=', 'room_numbers.id')
            ->pluck('room_numbers.id');

        if ($expiredBookings->isNotEmpty()) {
            // Update rooms based on expired bookings
            DB::table('room_numbers')
                ->whereIn('id', $expiredBookings)
                ->update(['status' => 'Active']);

            $this->info('Updated rooms as available.');
        } else {
            $this->info('No expired bookings found.');
        }

    }
}
