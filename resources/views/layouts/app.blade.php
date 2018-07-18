<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bus Tickating</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- bootswatch template css -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">
     <!-- Zebra Date picker CSS -->
    <link rel="stylesheet"  href="{{ asset('Zebra_Datepicker/dist/css/default/zebra_datepicker.min.css') }}" rel="stylesheet">
<style >


.btn.btn-square {
  border-radius: 0;
  padding: 20px 20px;
  font-size: 20px;
}
</style>
  <!-- Select2 CSS -->
  <link rel="stylesheet"  href="{{ asset('select2-4.0.6/dist/css/select2.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel"  >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __('Jovy Coaches') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                  
                                <li class="nav-item">
                                <a class="nav-link" href="{{ URL::to('routelist') }}">routes</a>
                                </li>
                   
                   
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
 
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap Js -->
    
    <script src="{{ asset('vendorbootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('vendorbootstrap/js/bootstrap.min.js') }}"></script>


    <!-- DataTables JavaScript -->
<script>
$(document).ready(function () {
    $('#dataTables-example').DataTable({
        responsive: true,
        drawCallback: function () {
            $('#dataTables-example_wrapper .row:last-child').addClass('mb-1 align-items-baseline');
        }
    });

     $('#dataTables-ex1').DataTable({
        responsive: true,
        drawCallback: function () {
            $('#dataTables-ex1_wrapper .row:last-child').addClass('mb-1 align-items-baseline');
        }
    });

     $('#dataTables-ex2').DataTable({
        responsive: true,
        drawCallback: function () {
            $('#dataTables-ex2_wrapper .row:last-child').addClass('mb-1 align-items-baseline');
        }
    });
});
</script>
<script type="text/javascript"src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/responsive.bootstrap4.js') }}"></script>
 <!-- Zebra Datepicker JavaScript -->
<script type="text/javascript" src="{{ asset('Zebra_Datepicker/dist/zebra_datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Zebra_Datepicker/custom.js') }}"></script>

 <!-- select2 JavaScript -->
<script type="text/javascript" src="{{ asset('select2-4.0.6/dist/js/select2.min.js') }}"></script>


<script>
   var choices_array=[];

$("button.btn-square").click(function(){
    var current_color=$(this).css('background-color');
    var cureent_color_to_hex=rgb2hex(current_color);
    var color=selectColor(choices_array.length);

    if(cureent_color_to_hex=="#f8f9fa" && choises_are_not_exceeded() ){//adds choice      
        $(this).css('background-color', color);
        
        choices_array.push($(this).prop("id") );
        display_choices();

    }else if(cureent_color_to_hex!="#f8f9fa"){//clears
        $(this).css('background-color', '#f8f9fa');

        removeChoice($(this).prop("id"));        
        update_colors();
        display_choices();
    }
   
});

function choises_are_not_exceeded(){
    if(choices_array.length>=4){
        return false;
    }
    
    return true;
}

function removeChoice(choice){
    var index = choices_array.indexOf(choice);

    if (index > -1) {
        choices_array.splice(index, 1);
    }
}

function selectColor(index){
    if(index==0){
        return "green"
    }else if(index==1){
        return "Orange";
    }else if(index==2){
        return "red";
    }else if(index==3){
        return "pink";
    }
}

function update_colors(){
    var x;
    var color;

    for(x in choices_array){   
        color=selectColor(x);     
        $('#'+choices_array[x]).css('background-color', color);
    }

}

function display_choices(){
   
    var todisplay = "";
    var x;
    for(x in choices_array){
        todisplay +=" " + choices_array[x];
    }

    $('#choices').val(todisplay); 
}

var hexDigits = new Array
        ("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"); 

//Function to convert rgb color to hex format
function rgb2hex(rgb) {
    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
}

function hex(x) {
    return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
}

</script>
</body>
</html>
