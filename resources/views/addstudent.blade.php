<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/core.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	
	<title>Add Students Data</title>
</head>
<body>
<caption style="text-align: center;"> Add Students Data </caption>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Students Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div >
        <form role="form" id="form">
        	{{csrf_field()}}
  <div class="form-group">
  	<strong></strong>
    <label for="fname">First Name</label>
    <div id="demo" style="color: red;"></div>
    <input type="text" name="fname" class="form-control" onautocompleteerror="your" id="fname">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="lname">Last Name</label>
    <input type="text" name="lname" class="form-control" id="lname">
  </div>
   <div class="form-group">
    <label for="course">Course</label>
    <input type="text" name="course" class="form-control" id="course">
  </div>
   <div class="form-group">
    <label for="section">Section</label>
    <input type="text" name="section" class="form-control" id="section">
  </div>
 
    <button type="submit" class="btn btn-primary" onclick="myFunction()">Submit</button>
</form>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" class="btn btn-primary">Save Datas</button>  -->
        
      </div>
    </div>
  </div>
</div>
<div class="container">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
  Launch demo modal
</button>

<div id="show" class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Students data</strong> Add students data!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script
  src="http://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script type="text/javascript">

 //function myFunction() {
 // var inpObj = document.getElementById("fname");
  //if (!inpObj.checkValidity()) {
 //   document.getElementById("demo").innerHTML = inpObj.validationMessage;
 // } else {
  //  document.getElementById("demo").innerHTML = "Input OK";
  //} 
//} 
function auto(){
  rules:{
    fname:
    {
    required:true
    }
  }
}

 function myFunction() {
   var text;

//   // Get the value of the input field with id="numb"
   var fname = document.getElementById("fname").value;

//   // If x is Not a Number or less than one or greater than 10
   if (fname=="") {
     text = "First name is not included";

 
//     alert("First Name must be filled out");
//     return false;
  }
     else if(fname.length < 4)
{
  text = "At least 4 characters needed";
}

    else {

//     alert("Must be filled out");
//     return false;
     text = "&#10003;";
   }
   document.getElementById("demo").innerHTML = text;
 }


  	$(document).ready(function(){




$('#form').on('submit',function(e)
{
	e.preventDefault();
	$.ajax({
		type : "POST",
		url : "/studentadd",
		data : $('#form').serialize(),
		success : function(response)
		{
			console.log(response)
			// $('#studentaddmodal').modal('hide')
			//$('strong').html(response);
			alert("Data Saved");

			location.reload();
		},
		error : function(error)
		{
			console.log(error)
			alert("Data Not Saved");
		}
	});
});


  		});
  </script>
</body>
</html>