<?php  
$username=$_POST['username'];
$password=$_POST['password'];

$con=new mysqli('localhost','root','','logo1');

if ($con->connect_error) {

	die('connection failed'.$con->connect_error);
}

else{

		$sql="select * from login where username='$username' and password='$password'";

		$result=mysqli_query($con,$sql);

		$row=mysqli_fetch_array($result,MYSQLI_ASSOC );

		$count=mysqli_num_rows($result);

		if ($count==1) {
			echo "<h1><center> Login susccesfully</h1></center";
			 include 'profile.html';
		}
else{

	echo"<h1> Login failed Invalid username or password</h1>";
}



}


?>
