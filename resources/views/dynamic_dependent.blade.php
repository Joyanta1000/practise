<!DOCTYPE html>
<html>
 <head>
  <title>Ajax Dynamic Dependent Dropdown in Laravel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Ajax Dynamic Dependent Dropdown in Laravel</h3><br />
   <div class="form-group">
    <select name="country" id="country" class="form-control input-lg dynamic" data-dependent="state">
     <option value="">Select Country</option>
     @foreach($country_list as $country)
     <option value="{{ $country->country}}">{{ $country->country }}</option>
     @endforeach
    </select>
   </div>
   <br />
   <div class="form-group">
    <select name="state" id="state" class="form-control input-lg dynamic" data-dependent="city">
     <option value="">Select State</option>
    </select>
   </div>
   <br />
   <div class="form-group">
    <select name="city" id="city" class="form-control input-lg dynamic" data-dependent="id">
     <option value="">Select City</option>
    </select>
   </div>
   <br />
   <br />
   <div class="form-group">
    <select name="id" id="id" class="form-control input-lg dynamic" data-dependent = "id">
     <option value="">Select ID</option>
     <!-- <option value="{{ $country->id }}">{{ $country->id }}</option> -->
    </select>
   </div>
   <br />
   <div class="form-group">
    <!-- <select name="id" id="id" class="form-control input-lg dynamic" >
     <option value="">Select ID</option>
    </select> -->

<!-- id="id" class="form-control input-lg dynamic" data-dependent="id" -->

    
<div>
  <table>
<tbody id="tbody">
  
</tbody>
</table>
 
</div>
   </div>
  
   {{ csrf_field() }}
   <br />
   <br />
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   
   var value = $(this).val();
   
   var dependent = $(this).data('dependent');
   //console.log(dependent);
   var _token = $('input[name="_token"]').val();
   //console.log(_token);
   $.ajax({
    url:"{{ route('dynamicdependent.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    dataType: 'json',
    success:function(data)
    {
      console.log(data);
     $('#'+dependent).html(data);
     //$('tbody').html(data);
      //document.getElementById("txtHint").innerHTML = this.data;

    }

   })
  }
 })
});

 // $('#id').change(function(){
 //  $('#country').val('');
 //  $('#state').val('');
 //  $('#city').val('');
 // });

 $('#country').change(function(){
  $('#state').val('');
  $('#city').val('');
  //$('#country').val('');
 });
  $('#state').change(function(){
  $('#city').val('');
  $('#address').val('');
 });
  $('#city').change(function(){
    //$('#id').val('');
  $('#address').val('');
  $('#persons').val('');
 });

  $('#id').change(function()
  {
var select = $(this).attr("id");
   
   var value = $(this).val();
   
   var dependent = $(this).data('dependent');
   //console.log(dependent);
   var _token = $('input[name="_token"]').val();
   //console.log(_token);
   $.ajax({
    url:"{{ route('dynamicdependent.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    dataType: 'json',
    success:function(data)
    {
      console.log(data);
     //$('#'+dependent).html(data);
     $('tbody').html(data);
      //document.getElementById("txtHint").innerHTML = this.data;

    }
  })
  });


    // $('#city').change(function(){
    //  $('#country').val('');
    // });


 // ******data fetch

//     $(document).on('keyup', '#id', function fetch_data(query = '') {
//       fetch_data();
//   $.ajax({
//     url:"{{ route('dynamicdependent.fetch') }}",
//     method: 'GET',
//     data: {query:query},
//     dataType: 'json',
//     success:function (data) {
//       console.log(data.table_data);
//     $('tbody').html(data.table_data);
//     }
//   })
// });
    // *******data fetch

   



 $(document).ready(function(){
fetch_data();
  function fetch_data(query = '') {
      //fetch_data();
   $.ajax({
    url:"{{ route('dynamicdependent.fetch') }}",
    method: 'GET',
    data: {query:query},
     dataType: 'json',
     success:function (data) {
      console.log(data.table_data);
     $('tbody').html(data.table_data);
     }
   })
 }

 $(document).on('select','#id', function(){
      var query = $(this).val();
      document.getElementById("txtHint").innerHTML = query;
    });
  });


// trial

function showCustomer(str) {
  var xhttp;  
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };




  xhttp.open("GET", "{{ route('dynamicdependent.fet') }}"+str, true);
  xhttp.send();
}

//trial end

</script>