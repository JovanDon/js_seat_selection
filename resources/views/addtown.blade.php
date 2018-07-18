@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if($errors->any())
                    <div class="alert alert-danger alert-important" >
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-header" style="color:#fff;" >
                
                @if($town->id) 
                    {{ __('Edit town') }} 
                @else 
                    {{ __('Add town') }}
                @endif
                </div>

                <div class="card-body">
                
                    <form method="POST" action="@if($town->id) {{ url('edittown_action') }} @else {{ url('addtown_action') }}  @endif" aria-label="{{ __('Town') }}">
                        @csrf
                       
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="color:#fff;" > {{ __('Name') }}</label>

                            <div class="col-md-6">
                               <input  value="@if($town->id) {{$town->name}}  @endif " id="name" type="text" placeholder="kampala" class="form-control" name="name" value="{{ old('name') }}" required >
                               @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bus_stage" class="col-md-4 col-form-label text-md-right" style="color:#fff;" >{{ __('Bus stage ') }}</label>

                            <div class="col-md-6">
                                <input value="@if($town->id) {{$town->bus_stage}}  @endif " id="bus_stage" type="bus_stage" class="form-control{{ $errors->has('bus_stage') ? ' is-invalid' : '' }}" name="bus_stage" value="{{ old('bus_stage') }}" >

                                @if ($errors->has('bus_stage'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bus_stage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right" style="color:#fff;" >{{ __('Country') }}</label>

                            <div class="col-md-6">
                            
                            <input value="@if($town->id) {{$town->country}}  @endif " id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country"  required autofocus>
                            <input value="@if($town->id) {{$town->id}}  @endif " type="hidden"  name="town_id">

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                @if($town->id) 
                                    {{ __('Update town') }} 
                                @else 
                                    {{ __('Add to towns') }}
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
