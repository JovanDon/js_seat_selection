@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Where and when do you want to travel?</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <form method="POST" action="{{ url('pre_booking') }}" aria-label="{{ __('where') }}">
                        @csrf
                                               
                       @include('whenwhere.select2')
                       @include('whenwhere.capturedate')
                       
                       <div class="row" >
                       <div class='col-md-6'></div>
                        <div class="form-group col-md-6" >
                                
                                <div class="col-md-5 offset-md-7">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('submit') }}
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
