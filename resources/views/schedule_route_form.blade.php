@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color:#fff;" >{{ __('schedule a route') }}</div>

                <div class="card-body">
                
                    <form method="POST" action="@if($is_form_to_edit) {{ url('updateschedule_action') }} @else {{ url('addschedule_action') }}  @endif" aria-label="{{ __('Schedule') }}">
                        @csrf
                       
                        <div class="form-group row">
                            <label for="route" class="col-md-4 col-form-label text-md-right" style="color:#fff;" > {{ __('Select route') }}</label>

                            <div class="col-md-6">
                               <select   id="route_id" class="form-control" name="route_id"  class="form-control js-example-basic-single"   required >
                               <option value="" > </option> 
                                @foreach($routes as $route)
                                    <option value="{{$route->id}}"  "@if($route_to_schedule && $route->id==$route_to_schedule) {{__('selected')}} @endif"  "@if($is_form_to_edit && $route->id==$scheduleData->route_id) {{__('selected')}} @endif" >{{$route->origin}} - {{$route->destination}}</option>
                                @endforeach
                               </select>
                               
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="route" class="col-md-4 col-form-label text-md-right" style="color:#fff;" > {{ __('Week day') }}</label>

                            <div class="col-md-6">
                               <select   id="weekday" class="form-control" name="weekday"  class="form-control js-example-basic-single"   required >
                               <option value="" ></option> day_of_week
                               <option value="Monday" "@if($scheduleData && $scheduleData->day_of_week=='Monday') {{__('selected')}} @endif" >Monday</option>
                                <option value="Tuesday" "@if($scheduleData && $scheduleData->day_of_week=='Tuesday') {{__('selected')}} @endif" >Tuesday</option>
                                <option value="Wenesday" "@if($scheduleData && $scheduleData->day_of_week=='Wenesday') {{__('selected')}} @endif" >Wenesday</option>
                                <option value="Thursday" "@if($scheduleData && $scheduleData->day_of_week=='Thursday') {{__('selected')}} @endif" >Thursday</option>
                                <option value="Friday" "@if($scheduleData && $scheduleData->day_of_week=='Friday') {{__('selected')}} @endif" >Friday</option>
                                <option value="Saturday" "@if($scheduleData && $scheduleData->day_of_week=='Saturday') {{__('selected')}} @endif" >Saturday</option>                                
                                <option value="Sunday" "@if($scheduleData && $scheduleData->day_of_week=='Sunday') {{__('selected')}} @endif" >Sunday</option>
                              </select>
                               
                            </div>
                        </div>
                       
                       <div class="form-group row">
                            <label for="departuretime" class="col-md-4 col-form-label text-md-right" style="color:#fff;" >{{ __('Departure time') }}</label>

                            <div class="col-md-3 ">

                                    <select   id="departuretime" class="form-control"  name="departuretime"     required >
                                        <option value="" ></option>                                
                                        <option value="1:00" "@if($scheduleData &&  $scheduleData->departure_time=='1:00') {{__('selected')}} @endif" >1:00</option>                                
                                        <option value="2:00" "@if($scheduleData && $scheduleData->departure_time=='2:00') {{__('selected')}} @endif" >2:00</option>
                                        <option value="3:00" "@if($scheduleData && $scheduleData->departure_time=='3:00') {{__('selected')}} @endif" >3:00</option>
                                        <option value="4:00" "@if($scheduleData && $scheduleData->departure_time=='4:00') {{__('selected')}} @endif" >4:00</option>
                                        <option value="5:00" "@if($scheduleData && $scheduleData->departure_time=='5:00') {{__('selected')}} @endif" >5:00</option>
                                        <option value="6:00" "@if($scheduleData && $scheduleData->departure_time=='6:00') {{__('selected')}} @endif" >6:00</option>
                                        <option value="7:00" "@if($scheduleData && $scheduleData->departure_time=='7:00') {{__('selected')}} @endif" >7:00</option>
                                        <option value="8:00" "@if($scheduleData && $scheduleData->departure_time=='8:00') {{__('selected')}} @endif" >8:00</option>
                                        <option value="9:00" "@if($scheduleData && $scheduleData->departure_time=='9:00') {{__('selected')}} @endif" >9:00</option>
                                        <option value="10:00" "@if($scheduleData && $scheduleData->departure_time=='10:00') {{__('selected')}} @endif" >10:00</option>
                                        <option value="11:00" "@if($scheduleData && $scheduleData->departure_time=='11:00') {{__('selected')}} @endif" >11:00</option>
                                        <option value="12:00" "@if($scheduleData && $scheduleData->departure_time=='12:00') {{__('selected')}} @endif" >12:00</option>
                                    </select>
                                </div>

                                <div class="col-md-2 offset-md-1">
                                    <input type='hidden' name='schedule_id' value='@if($scheduleData) {{$scheduleData->id}} @endif' >
                                    <select   id="format" class="form-control" name="format" recquired>
                                        <option value=""></option>
                                        <option value="am" " @if($scheduleData && $scheduleData->format=='am') {{__('selected')}} @endif"  >am</option>                                
                                        <option value="pm" "@if($scheduleData && $scheduleData->format=='pm') {{__('selected')}} @endif"  >pm</option>
                                    </select>
                                </div>
                            
                        </div> 


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">                                 
                                    {{ __('Schedule route') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
