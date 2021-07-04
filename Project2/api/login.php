<?php
session_start();
include("connect.php");
if(isset($_POST['login']))
{
 $mobile = $_POST['mobile']; 
 $password = $_POST['password'];
 $role = $_POST['role'];

$check = mysqli_query($connect,"SELECT * FROM users WHERE mobile='$mobile' AND password='$password' AND role='$role'");


if(mysqli_num_rows($check)>0){
	$userdata = mysqli_fetch_array($check);
	//print_r($userdata);
	//exit();
	$groups = mysqli_query($connect, "SELECT * FROM users WHERE role=2");
	$groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);
	
	$_SESSION['userdata'] = $userdata;
	//print_r($_SESSION['userdata']);
	//exit();
	
	$_SESSION['groupsdata'] = $groupsdata;
	echo'
	<script>
	      
		  window.location="../routes/dashboard.php";
	   </script>
	  ';
}
else{
	echo'
	   <script>
	      alert("Invalid Credentials Or user not found");
		  window.location="../";
	   </script>
	  ';
}
}
?>