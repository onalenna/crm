<?php 
session_start();
if (isset($_POST['login'])) {
	//echo "string";

	$pwd=$_POST['InputPassword'];
	$email=$_POST['InputEmail'];

	include('database.php');
	$query = "SELECT * FROM agent  WHERE email='$email' AND password='$pwd'";
	$result = mysqli_query($con,$query) or die("Failed: ".mysqli_error($con));;
	$row = mysqli_fetch_array($result);
	if ($email==$row['email'] && $pwd=$row['password']) {
		$_SESSION['email']=$row['email'];
		
      if ($row['UserType']=="admin") {
      	//echo $row['UserType'];
      	header("Location:index.php");
		
	}
	      if ($row['UserType']=="agent") {
      	//echo $row['UserType'];
      	header("Location:agent.php");
		
	}

	else{
		?>
			<div class="alert alert-danger">
				<strong>failed to login..please retry!</strong>
			</div>
			<?php
	}

}
else{
	?>
	<div class="alert alert-danger">
				<strong>failed to login..please retry!</strong>
			</div>
	<?php
}
}


?>
