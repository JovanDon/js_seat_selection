<?php

namespace App\business_logic;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use App\Routes;

class RoutesLogic
{
    use ValidatesRequests;    
    
    public function index(){
        $route= DB::table('routes')
        ->join('towns as origin_town', 'origin_town.id', '=', 'routes.origin_id')
        ->join('towns as destination_town', 'destination_town.id', '=', 'routes.destination_id')
        ->select('routes.*', 'destination_town.name as destination', 'origin_town.name as origin')
        ->get();

        return $route;
    }

    public function deleteroute($id){
        Routes::where("id",$id)->delete();
    }

    public function get_route_data($id){
        $route= DB::table('routes')
        ->join('towns as origin_town', 'origin_town.id', '=', 'routes.origin_id')
        ->join('towns as destination_town', 'destination_town.id', '=', 'routes.destination_id')
        ->select('routes.*', 'destination_town.name as destination', 'origin_town.name as origin')
        ->where('routes.id',$id)
        ->get();

        return $route[0];
    }
    
    public function update_route_data($id,$array){
        return Routes::where("id",$id)->update($array);
    }

    public function add(Request $request){
        
        $this->validateRoute($request);
        
        $route=Routes::create([
            "origin_id"=>$request->origin,
            "destination_id"=>$request->destination, 
            "cost"=>$request->cost,
            "min_hours_taken"=>$request->min_expected, 
            "max_hours_taken"=>$request->max_expected
        ]);
      	

        return $route;
    }
    
    protected function validateRoute(Request $request){
        $this->validate($request,[
            'origin' => 'required',
            'destination' => 'required',
            'cost' => 'required|numeric',
            'min_expected' => 'required|numeric',
            'max_expected' => 'required|numeric',

        ]);
    }

  
}
