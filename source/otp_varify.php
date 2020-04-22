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
		<h1>Varify OTP</h1>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<form action="" method="POST">
					<div class="form-group">
						<label for="exampleInputPassword1"> Mobile Number </label>
						<input type="number" class="form-control" id="number" name="number" placeholder="Enter Number">
						
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1"> OTP </label>
						<input type="number" class="form-control" id="info" name="info" placeholder="Enter Number">
					</div>
					<button type="submit" name="sendmsg" class=" btn btn-primary">Varify </button>
				</form>
			</div>
		</div>
	</div>
</div>


</body>
</html>

<?php

	$Number= $_POST['number'];
	$OtpNum= $_POST['info'];

	$con = mysqli_connect("localhost","root","");
  mysqli_select_db($con,"bdfund");
  $sql = "SELECT * FROM mobilevarify";
  $result = mysqli_query($con,$sql);
  
   $flag=0;
   while($rows = mysqli_fetch_assoc($result)) {
    
       $Mob = $rows['Mob']; 
       $Otp= $rows['Otp']; 
       if(($Mob==$Number)&&($Otp==$OtpNum)){
       	$flag=1;

       }     
}
if ($flag==1) {
	echo "Match";
}
else{
	echo "Rejected";
}
?>