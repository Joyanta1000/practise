
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<div style="padding-top: 100px; padding-left: 100px;">
<form class="form-inline" method="post" action="{{URL::to('/sms')}}">
	{{csrf_field()}}
  <div class="form-group mx-sm-3 mb-2">
<div style="position: inline;">
	@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
</div>
<br>
    <label for="inputPassword2" class="sr-only">TO:</label>
    <input type="text" class="form-control" id="inputPassword2" placeholder="Pone-Number" name="phonenumber"><br>
   
    <textarea type="text" name="message"></textarea>
  </div><br>
  <button type="submit" class="btn btn-primary mb-2">Send</button>
</form>

<div>
  <script type="text/javascript">
    const Nexmo = require('nexmo')

const nexmo = new Nexmo({
  apiKey: NEXMO_API_KEY,
  apiSecret: NEXMO_API_SECRET,
  applicationId: NEXMO_APPLICATION_ID,
  privateKey: NEXMO_APPLICATION_PRIVATE_KEY_PATH
})

nexmo.channel.send(
  { "type": "sms", "number": "+8801961902007" },
  { "type": "sms", "number": "+8801627962866" },
  {
    "content": {
      "type": "text",
      "text": "This is an SMS sent from the Messages API"
    }
  },
  (err, data) => { console.log(data.message_uuid); }
);
  </script>
</div>

</div>