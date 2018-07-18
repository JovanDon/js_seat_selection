<div class="row">
    <div class="col-md-6">
        <label for="container1" style="color:#FFF;"  class="col-md-4 col-form-label text-md-left">{{ __('Departure date') }}</label>
            
    </div>
    <div class="col-md-6">
    <label for="container2" style="color:#FFF;" class="col-md-4 col-form-label text-md-left">{{ __(' Return date') }}</label>
            
    </div>
</div>

<div class="row">
    <div class="col-md-5 offset-md-1">
        <div id="container1"  style="height:250px;"  ></div>
                 
    </div>
    <div class="col-md-5 offset-md-1">
        <div id="container2" style="height:250px;"  > </div>
    </div>
</div>

<div class="row">

    <div class="col-md-5 offset-md-1">        
       <div class="form-group" style="width:260px;">                  
            <input name="departuredate" readonly  id="visible-future1" type="text" class="form-control" data-zdp_readonly_element="false" >
        
        </div>
    </div>

    <div class="col-md-5 offset-md-1">
         <div class="form-group" style="width:260px;"  >                
          <input name="returndate" readonly   id="visible-future2" type="text"  class="form-control " data-zdp_readonly_element="false"   >
                    
        </div>
    </div>

</div>
