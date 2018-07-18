@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                 <h4 style="text-align:center;" >Route Schedules</h4>
             
                <div class="row" >
                    <div class="col-md-3 offset-md-9" >
                        <a  class="nav-link" href="{{ URL::to('schedule_route_form') }}" > <button class="btn btn-primary" type="button">Add a route schedule</button>  </a>
            
                    </div>
                </div> 
            
                      

                            <table width="100%" class="table table-striped table-bordered table-responsive-md" id="dataTables-example" >
                                <thead>
                                <tr>
                                    <th> Number</th>
                                    <th>Origin</th>
                                    <th>Destination</th>
                                    <th>Day of week</th>
                                    <th>Departure time</th>
                                    <th>Min time to travel</th>
                                    <th>Max time to travel</th>
                                    <th>Cost (shs)</th>

                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               @foreach ($schedules as $schedule) 
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$schedule->origin}}</td>
                                        <td>{{$schedule->destination}}</td>
                                        <td>{{$schedule->day_of_week}}</td>
                                        <td>{{$schedule->departure_time}}</td>
                                        <td>{{$schedule->min_hours_taken}}</td>
                                        <td>{{$schedule->max_hours_taken}}</td>
                                        <td>{{$schedule->cost}}</td>
                                        <td> 
                                            <form action="{{url('editschedule')}}"  method="post">
                                            @csrf
                                                <input name="schedule_id" type="hidden" value="{{$schedule->id}}" >
                                                <button class="btn btn-primary" type="submit">Edit</button>
                                            </form>
                                        </td>
                                    </tr>
                               @endforeach
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                     

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 