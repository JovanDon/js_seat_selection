<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\business_logic\TownsLogic;
use App\business_logic\RoutesLogic;

class RoutesController extends Controller
{
    public function index()
    {
        $logicManager=new RoutesLogic();
        $routes=$logicManager->index();
        $i=1;
        return view('routelist',compact("routes",$routes,"i",$i));
    }

    public function addform()
    {
        $towns=$this->get_all_towns();
        $app = app();
        $route = $app->make('stdClass');
        $route->id=null;
        
        return view('addroute',compact("towns",$towns,"route",$route));
    }

    protected function get_all_towns(){
        $logicManager=new TownsLogic();
        return $logicManager->index();
    }
    protected function get_all_routes(){
        $logicManager=new RoutesLogic();
        return $logicManager->index();
    }
    
    public function edit_route_form(Request $request)
    {
        $logicManager=new RoutesLogic();
        $route=$logicManager->get_route_data( $request->route_id);

        $towns=$this->get_all_towns();        
       
        return view('addroute',compact("route",$route,'towns',$towns));
    }
    
    public function create_route(Request $request)
    {
    
        $logicManager=new RoutesLogic();
        $logicManager->add($request);

        return $this->index();
    }

    public function update_route(Request $request)
    {
        $logicManager=new RoutesLogic();
        $routeData=[
            "origin_id"=>$request->origin,
            "destination_id"=>$request->destination, 
            "cost"=>$request->cost,
            "min_hours_taken"=>$request->min_expected, 
            "max_hours_taken"=>$request->max_expected
        ];
        
        $logicManager->update_route_data($request->route_id, $routeData);

        return $this->index();
    }
    
    public function delete_route(Request $request)
    {
        $logicManager=new RoutesLogic();
        $routes=$logicManager->deleteroute($request->route_id);

        return $this->index();
    }
      


}
