@extends('layouts.app')

@section('content')
<form method="POST" action="{{ url('radio_check') }}"  >
    @csrf

    <div class="container">
        <div class="row" >
        <label >Which cities would you like to visit?</label>
        </div>

        <div class="row" >
            <div class="col-md-3" >
                <div class="row" >
                        <input type="radio" value="new_York" id="city1" value="new_York"  >
                        <label for="city1">New York</label>
                    </div>

                <div class="row" >
                        <input type="radio" value="london" id="city1" name="city_radio"  >
                        <label for="city1">London</label>
                </div>

                <div class="row" >
                        <input type="radio" value="dubai" id="city1" name="city_radio"  >
                        <label  for="city1">Dubai</label> 
                </div>

                <div class="row" >
                        <input type="radio" value="paris" id="city1" name="city_radio"  >
                        <label  for="city1">Paris</label> 
                </div>

                <div class="row" >
                        <input type="radio" value="kampala" id="city1" name="city_radio"  >
                        <label  for="city1">Kampala</label> 
                </div>

            </div>

        </div>

    </div>




    <div class="container">
        <div class="row" >
        <label >Which cities would you like to visit? 2</label>
        </div>

        <div class="row" >
            <div class="col-md-3" >
                <div class="row" >
                        <input type="checkbox" value="new York" name="new_York" id="city1"   >
                        <label for="city1">New York</label>
                    </div>

                <div class="row" >
                        <input type="checkbox"  value="london" name="london" id="city1"  >
                        <label for="city1">London</label>
                </div>

                <div class="row" >
                        <input type="checkbox"  name="dubai" value="dubai" id="city1"  >
                        <label  for="city1">Dubai</label> 
                </div>

                <div class="row" >
                        <input type="checkbox"  name="paris"  value="paris" id="city1"  >
                        <label  for="city1">Paris</label> 
                </div>

                <div class="row" >
                        <input type="checkbox"  name="kampala" value="kampala" id="city1"  >
                        <label  for="city1">Kampala</label> 
                </div>

                <div class="row" >
                    
                    <button type="submit" class="btn btn-info" >Submit </button>
                 </div>

            </div>

        </div>

    </div>

</form>
@endsection
 