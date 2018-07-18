<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\business_logic\BookingsLogic;

class BookingsController extends Controller
{
    public function index(){
        $logicManager=new BookingsLogic();
        $bookings=$logicManager->index();
      
        return view('bookings',compact('bookings',$bookings));
    }
    public function booktrip(Request $request){
        //get schedule data for a trip
        return view('client_schedules');
    }
    public function fetch_suitable_schedules(Request $request){

        $logicManager=new BookingsLogic();
        $arr=$this->define_data_pre_bookin($request);

        $schedules=$logicManager->get_shcedules_for_booking($arr); 
        $return_schedules=$schedules['return'];
        $return_schedules->date=$request->returndate;
        
        $departure_schedules=$schedules['departure'];
        if($departure_schedules->isEmpty()){
            dd('Schedules not found for '.$request->departuredate.'' );
        }
        $departure_schedules->date=$request->departuredate;
    
        return view('client_schedules',compact('departure_schedules',$departure_schedules,'return_schedules',$return_schedules ));
    }

    public function make_booking(Request $request){
        $logicManager=new BookingsLogic();
        
        $logged_in_user=Auth::user();
        $ticketData=$logicManager->book_departure_trip($request,$logged_in_user);
        
        $this->view_user_bookings();
    }

    public function view_user_bookings(){
        $logged_in_user=Auth::user();
        $logicManager=new BookingsLogic();
        $user_bookings=$logicManager->get_user_bookings($logged_in_user);

        return view('user_bookings',compact('user_bookings',$user_bookings ));
        
    }

    public function define_data_pre_bookin(Request $request){
        return [
            "origin_id" => $request->origin,
            "destination_id" => $request->destination,
            "departuredate" => $request->departuredate,
            "returndate" => $request->returndate
        ];
        
    }
    
    
}
