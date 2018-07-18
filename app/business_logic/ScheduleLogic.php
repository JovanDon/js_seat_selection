<?php

namespace App\business_logic;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use App\Schedules;

class ScheduleLogic
{
    use ValidatesRequests;
    
    public function index(){
        $schedule= DB::table('schedules')
        ->join('routes', 'schedules.route_id', '=', 'routes.id')        
        ->join('towns as origin_town', 'origin_town.id', '=', 'routes.origin_id')
        ->join('towns as destination_town', 'destination_town.id', '=', 'routes.destination_id')
        ->select('schedules.*', 'routes.cost', 'routes.min_hours_taken' , 'routes.max_hours_taken', 'destination_town.name as destination', 'origin_town.name as origin')
        ->get();

        return $schedule;
    }

    public function delete_schedule($id){
        Schedules::where("id",$id)->delete();
    }

    public function get_schedule_data($id){
        $schedule= DB::table('schedules')
        ->join('routes', 'schedules.route_id', '=', 'routes.id')        
        ->join('towns as origin_town', 'origin_town.id', '=', 'routes.origin_id')
        ->join('towns as destination_town', 'destination_town.id', '=', 'routes.destination_id')
        ->select('schedules.*', 'routes.cost', 'routes.min_hours_taken' , 'routes.max_hours_taken', 'destination_town.name as destination', 'origin_town.name as origin')
        ->where('schedules.id',$id)
        ->get();

        return $schedule[0];
    }
    
    public function update_schedule_data($id,$array){
        return Schedules::where("id",$id)->update($array);
    }

    public function add(Request $request){
        
        $this->validateRoute($request);
      
        $schedule=Schedules::create([
            "day_of_week"=>$request->weekday,
            "departure_time"=>$request->departuretime." ".$request->format, 
            "route_id"=>$request->route_id
        ]);
      	

        return $schedule;
    }
    
    protected function validateRoute(Request $request){
        $this->validate($request,[
            'weekday' => 'required',
            'departuretime' => 'required',
            'route_id' => 'required|numeric',

        ]);
    }

}
