<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\business_logic\TownsLogic;
use Artisan;

class TownsController extends Controller
{
    public function index()
    {
        $exitCode = Artisan::call('email:send', [
            'user_lname' => 'mutesasira', 'user_fname' => 'jovan'
        ]);
        
        dd($exitCode);

        $logicManager=new TownsLogic();
        $towns=$logicManager->index();
        $i=1;
        return view('townlist',compact("towns",$towns,"i",$i));
    }
    public function addform()
    {
        $app = app();
        $town = $app->make('stdClass');
        $town->id=null;

        return view('addtown',compact("town",$town));
    }
    
    public function edit_town_form(Request $request)
    {
        $logicManager=new TownsLogic();
        $town=$logicManager->get_town_data( $request->town_id);
        
        return view('addtown',compact("town",$town));
    }
    
    public function create_town(Request $request)
    {
        $logicManager=new TownsLogic();
        $logicManager->add($request);

        return $this->index();
    }

    public function update_town(Request $request)
    {
        $logicManager=new TownsLogic();
        
        $logicManager->update_town_data($request->town_id, ["name" => $request->name, "bus_stage" =>$request->bus_stage, "country" => $request->country]);

        return $this->index();
    }
    public function delete_town(Request $request)
    {
        $logicManager=new TownsLogic();
        $towns=$logicManager->deletetown($request->town_id);

        return $this->index();
    }
      

}
