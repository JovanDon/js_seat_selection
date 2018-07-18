@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color:#fff;" >
                
                    @if($route->id) 
                        {{ __('Edit route') }} 
                    @else 
                        {{ __('Add route') }}
                    @endif
                </div>

                <div class="card-body">
                
                    <form method="POST" action="@if($route->id) {{ url('editroute_action') }} @else {{ url('addroute_action') }}  @endif"  aria-label="{{ __('Route') }}">
                        @csrf
                       
                        <div class="form-group row">
                            <label for="origin" class="col-md-4 col-form-label text-md-right" style="color:#fff;" > {{ __('Origin') }}</label>

                            <div class="col-md-6">
                                <select class="form-control js-example-basic-single" id="origin" class="form-control{{ $errors->has('origin') ? ' is-invalid' : '' }}" name="origin"  >
                                <option value="" > select Origin</option>
                                 @foreach($towns as $town)
                                        <option value="{{$town->id}}" "@if($route->id) @if($town->name==$route->origin) {{__('selected')}}  @endif @endif" >{{$town->name}}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="destination" class="col-md-4 col-form-label text-md-right" style="color:#fff;" >{{ __('Destination ') }}</label>

                            <div class="col-md-6">
                         
                                <select class="form-control js-example-basic-single" id="destination" class="form-control{{ $errors->has('destination') ? ' is-invalid' : '' }}" name="destination"  >
                                <option value="" > select destination</option>
                                 @foreach($towns as $town)
                                        <option value="{{$town->id}}" "@if($route->id) @if($town->name==$route->destination) {{__('selected')}}  @endif @endif" >{{$town->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cost" class="col-md-4 col-form-label text-md-right" style="color:#fff;" >{{ __('Cost') }}</label>

                            <div class="col-md-6">
                            
                            <input value="@if($route->id) {{$route->cost}}  @endif " id="cost" type="text" class="form-control{{ $errors->has('cost') ? ' is-invalid' : '' }}" name="cost" value="{{ old('cost') }}" required autofocus>

                                @if ($errors->has('cost'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cost') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="min_expected" class="col-md-6 col-form-label text-md-right" style="color:#fff;" >{{ __('Minimum Expected time to travel') }}</label>

                            <div class="col-md-4">
                                <input value="@if($route->id) {{$route->min_hours_taken}}  @endif " id="min_expected" type="text" class="form-control{{ $errors->has('min_expected') ? ' is-invalid' : '' }}" name="min_expected" value="{{ old('min_expected') }}" required autofocus>

                                @if ($errors->has('min_expected'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('min_expected') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                          <div class="form-group row">
                            <label for="max_expected" class="col-md-6 col-form-label text-md-right" style="color:#fff;" >{{ __('Maximum Expected time to travel') }}</label>

                            <div class="col-md-4">
                                <input value="@if($route->id) {{$route->max_hours_taken}}  @endif " id="max_expected" type="text" class="form-control{{ $errors->has('max_expected') ? ' is-invalid' : '' }}" name="max_expected" value="{{ old('max_expected') }}" required autofocus>
                                <input value="@if($route->id) {{$route->id}}  @endif " type="hidden"  name="route_id">


                                @if ($errors->has('max_expected'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('max_expected') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                @if($route->id) 
                                    {{ __('Update Route') }} 
                                @else 
                                    {{ __('Add to Route') }}
                                @endif
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
