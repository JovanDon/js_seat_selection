@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
             <h4 style="text-align:center;" >Towns</h4>
             
            <div class="row" >
                <div class="col-md-2 offset-md-10" >
                    <a class="nav-link" href="{{ URL::to('addtownform') }}"> <button class="btn btn-primary" type="button">add town</button>  </a>
                </div>
            </div>  

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
                                    <th> Number</th>
                                    <th>Name</th>
                                    <th>Bus Stage</th>
                                    <th>Country</th>
                                    <th>Action 1</th>
                                    <th>Action 2</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($towns as $town)
                                    <tr >
                                        <td>{{$i++}}</td>
                                        <td>{{$town->name}}</td>
                                        <td>{{$town->bus_stage}}</td>
                                        <td>{{$town->country}}</td>
                                        <td> 
                                            <form action="{{url('edittown')}}"  method="post">
                                            @csrf
                                                <input name="town_id" type="hidden" value="{{$town->id}}" >
                                                <button class="btn btn-primary" type="submit">Edit</button>
                                            </form>
                                        </td>
                                        <td> 
                                            <form action="{{url('deletetown_action')}}"  method="post">
                                            @csrf
                                                <input name="town_id" type="hidden" value="{{$town->id}}">
                                                <button class="btn btn-danger" type="submit">delete</button>
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
 