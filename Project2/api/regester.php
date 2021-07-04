<?php
include("connect.php");

if(isset($_POST['reg']))
{
		echo $name = $_POST['name'];
		echo $mobile = $_POST['mobile'];
		echo $password = $_POST['password'];
		echo $cpassword = $_POST['cpassword'];
		echo $address = $_POST['address'];
		echo $image = $_FILES['photo']['name'];
		echo $tmp_name = $_FILES['photo']['tmp_name'];
		echo $role = $_POST['role'];
		 
		/*
		print_r($row);
			
			echo $row['name']."<br>";
			echo $row['mobile']."<br>";
			echo $row['password']."<br>";
			echo $row['cpassword']."<br>";
			echo $row['address']."<br>";
			echo $row['photo']."<br>";
			echo $row['role']."<br>";
		  */ 
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
}

?>