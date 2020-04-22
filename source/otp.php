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
		<h1>Generate OTP</h1>
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
					<button type="submit" name="sendmsg" class=" btn btn-primary">Send Message </button><br/>
					<p></p>
					<a href="http://localhost/sms/otp_varify.php"> Force Process To Vaify</a>
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

if (isset($_POST['sendmsg'])) {
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"bdfund");
$Num = $_POST['number'];
$Otp =$randt;

$sqli = "SELECT * FROM mobilevarify";
  $result = mysqli_query($con,$sqli);
  $flag=0;
  
   
   while($rows = mysqli_fetch_assoc($result)) {
    
       $Mob = $rows['Mob'];  
       if($Mob==$Num ){
       	echo "Number already exist";
       	$flag=1;
       	break;

       }
}
if ($flag!=1) {
	$sql ="INSERT INTO mobilevarify (Mob,Otp) VALUES ('$Num','$Otp')";

		if(!mysqli_query($con,$sql))
		{
			echo "Not Sent";
		}
		else{
			echo "Sent";
			header("Location: http://localhost/sms/otp_varify.php");
		}

}
}

?>