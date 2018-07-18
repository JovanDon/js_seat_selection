<?php

namespace App\business_logic;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use App\Towns;

class TownsLogic
{
    use ValidatesRequests;    
    
    public function index(){
        return Towns::all();
    }

    public function deletetown($id){
        Towns::where("id",$id)->delete();
    }

    public function get_town_data($id){
        return Towns::find($id);
    }
    
    public function update_town_data($id,$array){
        return Towns::where("id",$id)->update($array);
    }

    public function add(Request $request){
        
        $this->validateTown($request);
        
        $town=Towns::create([
            "name"=>$request->name,
            "country"=>$request->country, 
            "bus_stage"=>$request->bus_stage
        ]);

        return $town;
    }
    
    protected function validateTown(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:180',
            'country' => 'required|string|max:180',
            'bus_stage' => 'required|string|max:180',
        ]);
    }

  
}
