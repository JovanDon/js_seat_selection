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
                    <h3 style="text-align:center; margin-bottom:30px;" >Bus Schedules for {{$departure_schedules->first()->origin}}-{{$departure_schedules->first()->destination}}</h3>
                    <form method="POST" action="{{ url('book') }}" aria-label="{{ __('Book') }}">
                        @csrf
                        @include('schedule_includes.schedule_table_1way') 

                        @if(!$return_schedules->isEmpty())
                        
                            @include('schedule_includes.schedule_table_2way')   
                        
                        @endif  

                        
                        
                        <div class="row" >
                        <label for="paid" class="col-md-3 offset-md-4 col-form-label text-md-right" style="color:#fff;" >{{ __('Payment') }}</label>

                            <div class='col-md-3'>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">(shs)</span>
                                    </div>
                                    <input  name="paid" id="paid" class="form-control" type="number"  />
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group col-md-2" >
                                
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Book') }}
                                    </button>
                                
                            </div>
                            </div>
                        </div>

                    </form>

                      
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
 