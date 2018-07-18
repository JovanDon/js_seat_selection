


<h5 style="text-align:center;" >Returning Scedules @{{$return_schedules->date}} (Pick up stage : wandegeya Park)</h5>
<table width="100%" class="table table-striped table-bordered table-responsive-md" id="dataTables-ex2">
            <thead>
            <tr>
                <th>Departure time</th>
                <th>Cost(shs)</th>
                <th>Choices</th>
            </tr>
            </thead>
            <tbody>
            {{$i=1}}
            @foreach($return_schedules as $schedule)
                <tr >
                    <td>{{$schedule->departure_time}}</td>
                    <td> 
                    {{$schedule->cost}}
                    </td>
                    <td>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="returning_schedule1" name="returning_schedule"  class="custom-control-input" checked="">
                            <label class="custom-control-label" for="returning_schedule1">choice {{$i++}}</label>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table> 
        <input type='hidden' value="{{$return_schedules->date}}" name='return_date' >
        <!-- /.table-responsive -->