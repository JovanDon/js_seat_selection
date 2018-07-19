@extends('layouts.app')

@section('content')
<form method="POST" action="{{ url('radio_check') }}"  >
    @csrf
    <div class="container">
        <div class="row" >
        <label >Gender</label>
        </div>

        <div class="row" >
            <div class="col-md-3" >
                <div class="row" >
                        <input type="radio" value="male" id="male" name="gender"  >
                        <label for="male">Male</label>
                    </div>

                <div class="row" >
                        <input type="radio" value="female" id="female" name="gender"  >
                        <label for="female">Female</label>
                </div>


        </div>

    </div>
    <div class="container">
        <div class="row" >
        <label >Which cities would you like to visit?</label>
        </div>

        <div class="row" >
            <div class="col-md-3" >
                <div class="row" >
                        <input type="radio" value="new York" id="newYork" name="city_radio"  >
                        <label for="newYork">New York</label>
                    </div>

                <div class="row" >
                        <input type="radio" value="london" id="london" name="city_radio"  >
                        <label for="london">London</label>
                </div>

                <div class="row" >
                        <input type="radio" value="dubai" id="dubai" name="city_radio"  >
                        <label  for="dubai">Dubai</label> 
                </div>

                <div class="row" >
                        <input type="radio" value="paris" id="paris" name="city_radio"  >
                        <label  for="paris">paris</label> 
                </div>

                <div class="row" >
                        <input type="radio" value="kampala" id="kampala" name="city_radio"  >
                        <label  for="kampala">Kampala</label> 
                </div>

            </div>

        </div>

    </div>




    <div class="container">
        <div class="row" >
        <label >Which cities would you like to visit?</label>
        </div>

        <div class="row" >
            <div class="col-md-3" >
            <div class="row" >
                        <input type="checkbox" id="selectall"   >
                        <label for="check_newYork">Select All</label>
              </div> 

                <div class="row" >
                        <input type="checkbox" value="new York" id="check_newYork" name="city_checkbox[]"   class="city_checkbox"  >
                        <label for="check_newYork">New York</label>
                    </div>

                <div class="row" >
                        <input type="checkbox"  value="london" id="check_london" name="city_checkbox[]"   class="city_checkbox"  >
                        <label for="check_london">London</label>
                </div>

                <div class="row" >
                        <input type="checkbox"  value="dubai" id="check_dubai" name="city_checkbox[]"   class="city_checkbox"  >
                        <label  for="check_dubai">Dubai</label> 
                </div>

                <div class="row" >
                        <input type="checkbox"  value="paris" id="check_paris" name="city_checkbox[]"   class="city_checkbox"  >
                        <label  for="check_paris">Paris</label> 
                </div>

                <div class="row" >
                        <input type="checkbox"  value="kampala" id="check_kampala" name="city_checkbox[]"   class="city_checkbox"  >
                        <label  for="check_kampala">Kampala</label> 
                </div>

                <div class="row" >
                    
                    <button type="submit" class="btn btn-info" >Submit </button>
                 </div>

            </div>

        </div>

    </div>

</form>
@endsection
 


 <script>

$(
    function(){

        $("#selectall").click(function(){
            
        if( $(this).prop('checked')===true ){
            $(".city_checkbox").prop('checked',true);
        }else{
            $(".city_checkbox").prop('checked',false);
        }
        
        });

    }
);

</script>