<?php
include("connect.php");

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['address'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];

if($password==$cpassword){
	move_uploaded_file($tmp_name, "../uploads/$image");
	$insert =  "INSERT INTO users(name,mobile,password,address,photo,role,status,votes)
	  VALUES ('$name','$mobile','$password','$address','$image','$role',0,0)";
      $result = mysqli_query($connect,$insert); 
    if($result){
	echo'
	  <script>
	      alert("Regestration Successfull!!");
		  window.location="../";
	  </script>
	  ';
	}
	
	else{
		echo'
		<script>
		    alert("Some error occured");
			window.location ="../routes/register.html";
			</script>
			';
	}
}
else
{
	echo'
	   <script>
	      alert("Password and Confirm Password does not match");
		  window.location="../routes/register.html";
	   </script>
	  ';
}

?>