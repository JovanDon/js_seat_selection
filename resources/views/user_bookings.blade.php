@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                

                <div class="panel-body">
            @if($errors->any())
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach()
            </div>
        @endif                  

                            <table width="100%" class="table table-striped table-bordered table-responsive-md" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th> Date</th>
                                    <th>trip</th>
                                    <th>Cost</th>
                                    <th>Booking deposit</th>
                                    <th>booked at</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($user_bookings as $user_booking)
                                    <tr >
                                        <td>{{$user_booking->travel_date}}</td>
                                        <td>{{$user_booking->origin}}-{{$user_booking->destination}}</td>
                                        <td>{{$user_booking->cost}}</td>                                       
                                        <td>{{$user_booking->paid}}</td>
                                        <td>{{$user_booking->created_at}}</td>
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
 