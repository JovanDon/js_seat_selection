<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\business_logic\RoutesLogic;
use App\business_logic\ScheduleLogic;

class ScheduleController extends Controller
{
    public function index()
    {
        $logicManager=new ScheduleLogic();
        $schedules=$logicManager->index();
        $i=1;
        return view('schedule_list',compact('schedules',$schedules,'i',$i));
    }
    public function searched_schedules(Request $request)
    {
        //search schedules according to user data
        return view('client_schedules');
    }

    public function addform()
    {

        $logicManager=new RoutesLogic();
        $routes=$logicManager->index();
        $is_form_to_edit=false;
        $scheduleData=null;
        $route_to_schedule=null;
        
        return view('schedule_route_form',compact("routes",$routes,'is_form_to_edit',$is_form_to_edit, 'scheduleData',$scheduleData,'route_to_schedule',$route_to_schedule));
    }
    public function editform(Request $request)
    { 
        $logicManager=new ScheduleLogic();
        $scheduleData=$logicManager->get_schedule_data($request->schedule_id);
        $scheduleData=$this->prepare_formSchedule_data($scheduleData);

        $logicManager=new RoutesLogic();
        $routes=$logicManager->index();

        $is_form_to_edit=true;
        $route_to_schedule=null;
        
        return view('schedule_route_form',compact("routes",$routes,'is_form_to_edit',$is_form_to_edit,'scheduleData',$scheduleData, 'route_to_schedule',$route_to_schedule));
    }
    public function display_schedule_route_form(Request $request)
    { 
        $logicManager=new ScheduleLogic();
        $scheduleData=null;

        $logicManager=new RoutesLogic();
        $routes=$logicManager->index();

        $is_form_to_edit=false;
        $route_to_schedule=$request->route_id;

        
        return view('schedule_route_form',compact("routes",$routes,'is_form_to_edit',$is_form_to_edit,'scheduleData',$scheduleData,'route_to_schedule',$route_to_schedule));
    }

    

    protected function prepare_formSchedule_data($scheduleData){
        $d_time_data=explode(" ",$scheduleData->departure_time);
        $scheduleData->departure_time=$d_time_data[0];
        $scheduleData->format=$d_time_data[1];
        $scheduleData->day_of_week=ucfirst($scheduleData->day_of_week);
        return $scheduleData;
    }
    public function make_schedule(Request $request)
    {
    
        $logicManager=new ScheduleLogic();
        $logicManager->add($request);
                
        return $this->index();
    }

    public function update_schedule(Request $request)
    {
        $logicManager=new ScheduleLogic();
        $scheduleData=[
            "day_of_week"=>$request->weekday,
            "departure_time"=>$request->departuretime." ".$request->format, 
            "route_id"=>$request->route_id
        ];
        
        $logicManager->update_schedule_data($request->schedule_id, $scheduleData);

        return $this->index();
    }
  
    
}
