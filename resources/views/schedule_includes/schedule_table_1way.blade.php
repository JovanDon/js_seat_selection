<h5 style="text-align:center;" >Departure Scedules for {{$departure_schedules->date}} Pick up stage : {{$departure_schedules->first()->origin_stage}} </h5>
<table width="100%" class="table table-striped table-bordered table-responsive-md" id="dataTables-ex1">
            <thead>
            <tr>
                <th>Departure time</th>
                <th>Cost(shs)</th>
                <th>Choices</th>
            </tr>
            </thead>
            <tbody>
            {{$i=1}}
            @foreach ($departure_schedules as $schedule)
                <tr >
                    <td>{{$schedule->departure_time}}</td>
                    <td> 
                    {{$schedule->cost}}
                    </td>
                    <td>
                        <div class="custom-control custom-radio">
                            <input type="radio" value="{{$schedule->id}}" id="departure_schedule1" name="departure_schedule"  class="custom-control-input" checked="">
                            <label class="custom-control-label" for="departure_schedule1">choice {{$i++}}</label>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <input type='hidden' value="{{$departure_schedules->date}}" name='departure_date' >
        <!-- /.table-responsive -->