<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SMS</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<div class="jumbotron">
		<h1>Send OTP</h1>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<form action="" method="POST">
					<div class="form-group">
						<label for="exampleInputPassword1"> Mobile Number </label>
						<input type="number" class="form-control" id="number" name="number" placeholder="Enter Number">
						
					</div>
					<!-- <div class="form-group">
						<label for="exampleInputPassword1"> Message </label>
						<textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
					</div> -->
					<button type="submit" name="sendmsg" class=" btn btn-primary">Send Message </button>
				</form>
			</div>
		</div>
	</div>
</div>


</body>
</html>

<?php
$rand1= rand(129,529);
$rand2= rand(625,833);
$randt= "$rand1"."$rand2";

$token = "26362e4b276aa76a2d7d25cd43144e9b";
if (isset($_POST['sendmsg'])) {
	$to= $_POST['number'];
	$msg = $randt;
$url = "http://api.greenweb.com.bd/api.php";
	$data= array(
'to'=>"$to",
'message'=>"$msg",
'token'=>"$token"
); // Add parameters in key value
$ch = curl_init(); // Initialize cURL
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$smsresult = curl_exec($ch);

//Result
echo $smsresult;

//Error Display
echo curl_error($ch);
}
?>