<?php

namespace App\business_logic;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Bookings;

class BookingsLogic
{
    use ValidatesRequests;
    public function index(){
        $bookings= DB::table('bookings')        
        ->join('users', 'users.id', '=', 'bookings.passanger_id') 
        ->join('schedules', 'schedules.id', '=', 'bookings.schedule_id')               
        ->join('routes', 'schedules.route_id', '=', 'routes.id')        
        ->join('towns as origin_town', 'origin_town.id', '=', 'routes.origin_id')
        ->join('towns as destination_town', 'destination_town.id', '=', 'routes.destination_id')
        ->select('bookings.*','schedules.day_of_week', 'schedules.departure_time', 'routes.min_hours_taken', 'routes.cost' , 'routes.max_hours_taken', 'destination_town.name as destination', 'origin_town.name as origin','origin_town.bus_stage as origin_stage','users.name', 'users.email')
        ->get();

        return $bookings;
    }
   
    public function book_departure_trip(Request $request,User $logged_in_user){
       
        $this->validateBooking($request);
        
       
        
        $booking=Bookings::create([
            "paid"=>$request->paid,
            "favourite_seat"=>'off-window', 
            "travel_date"=>$request->departure_date,
            "ticket_number"=>str_random(10),
            "passanger_id"=>$logged_in_user->id,
            "schedule_id"=>$request->departure_schedule,
        ]);;

        return $booking;
    } 
    protected function validateBooking(Request $request){
        $this->validate($request,[
            'paid' => 'required|numeric',
            'departure_date' => 'required|string|max:20',
            'departure_schedule' => 'required|numeric',
        ]);
    }

    public function get_shcedules_for_booking($array){
       
        $travelday = \Carbon\Carbon::parse($array['departuredate'])->format('l');
        $returnday = \Carbon\Carbon::parse($array['returndate'])->format('l');
       
        $schedules_departure=$this->search_schedules($travelday,$array['origin_id'], $array['destination_id']);

        $schedules_return=$this->search_schedules($returnday,$array['destination_id'], $array['origin_id']);
  
        return [
            'departure'=>$schedules_departure,
            'return'=>$schedules_return,
        ];

    }

    protected function search_schedules($day, $origin_town_id, $destination_town_id){
        return  DB::table('schedules')
        ->join('routes', 'schedules.route_id', '=', 'routes.id')        
        ->join('towns as origin_town', 'origin_town.id', '=', 'routes.origin_id')
        ->join('towns as destination_town', 'destination_town.id', '=', 'routes.destination_id')
        ->select('schedules.*', 'routes.cost', 'routes.min_hours_taken' , 'routes.max_hours_taken', 'destination_town.name as destination', 'origin_town.name as origin','origin_town.bus_stage as origin_stage')
        ->where([
            ['schedules.day_of_week',$day],
            ['origin_town.id',$origin_town_id],
            ['destination_town.id',$destination_town_id],
        ])
        ->get();
    }
    
    
   public function get_user_bookings(User $user){
        return  DB::table('bookings')
        ->join('schedules', 'schedules.id', '=', 'bookings.schedule_id')               
        ->join('routes', 'schedules.route_id', '=', 'routes.id')        
        ->join('towns as origin_town', 'origin_town.id', '=', 'routes.origin_id')
        ->join('towns as destination_town', 'destination_town.id', '=', 'routes.destination_id')
        ->select('bookings.*','schedules.day_of_week', 'schedules.departure_time', 'routes.min_hours_taken', 'routes.cost' , 'routes.max_hours_taken', 'destination_town.name as destination', 'origin_town.name as origin','origin_town.bus_stage as origin_stage')
        ->where('bookings.passanger_id',$user->id)
        ->get();
   }

}
