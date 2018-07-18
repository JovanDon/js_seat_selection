@extends('layouts.app')

@section('content')
<h4 style="text-align:center;" >Bookings</h4>
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

                            <table width="120%" class="table table-striped table-bordered table-responsive-md" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th> N0.</th>
                                    <th>client info</th>
                                    <th>trip</th>
                                    <th>trip date</th>
                                    <th>ticket number</th>
                                    <th>Paid on booking</th>
                                    <th>favourite seat</th>
                                    <th>booked at</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{$i=1}}
                               @foreach ($bookings as $booking)
                                    <tr >
                                        <td>{{$i++}}</td>
                                        <td>{{$booking->name}} ({{$booking->email}})</td>
                                        <td>{{$booking->origin}}-{{$booking->destination}}</td>
                                        <td>{{$booking->travel_date}}</td>
                                        <td>{{$booking->ticket_number}}</td>                                        
                                        <td>{{$booking->paid}}</td>
                                        <td>{{$booking->favourite_seat}}</td>
                                        <td>{{$booking->created_at}}</td>
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
 