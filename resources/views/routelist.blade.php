@extends('layouts.app')

@section('content')


<div class="container">
 
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

        
                <div class="panel-body">

                    <div class="container">

                        <div class="row">
                            <div class="col-md-2 offset-5">

                            @include('movie_seat_choices.tableparts')
                            </div>                                    
                        </div > 
                    </div>  

                    
                      <form method="POST" action="{{ url('editroute_action') }}"  aria-label="{{ __('Choices') }}">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="choices" class="col-md-4 col-form-label text-md-right" style="color:#fff;" >{{ __('Choices ') }}</label>

                            <div class="col-md-6">
                                <input  id="choices" type="text" class="form-control" name="choices"  >

                            </div>
                        </div>

                            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"> {{ __('Sumbit') }}</button>
                            </div>
                        </div>
                        </form>                    

             </div>
            </div>
        </div>
    </div>
</div>
@endsection
 