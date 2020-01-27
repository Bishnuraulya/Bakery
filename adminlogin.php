

<?php
	session_start();
	if(isset($_POST['submit'])){
		
	$con=mysqli_connect("localhost","root","","summer");

	$email=$_POST['email'];
	$password=$_POST['password'];
	$_SESSION['email']=$_POST;
	

	if(empty($email)|| empty($password)){
		header("location:login.php?error=emptyfields");
		exit();
	}
		else{
			$sql="SELECT * FROM admin WHERE email=? ";
			$stmt=mysqli_stmt_init($con);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				header("location:adminlogin.php?error=sqlerror");
			exit();
			}
			else{
				mysqli_stmt_bind_param($stmt,"s",$email);
				mysqli_stmt_execute($stmt);
				$result=mysqli_stmt_get_result($stmt);
				if($row= mysqli_fetch_assoc($result)){
					
					if($password!=$row['password']) {
						header("location:adminlogin.php?error=wrongpasspword");
						exit();
					}
					else{
						$_SESSION['adminname']=$row['name'];
						$_SESSION['email']=$row['email'];
						header("location:adminshow.php.?signup=success");
					exit();
					}
				}
				else{
					header("location:adminlogin.php?error=nouser");
					exit();
				}
			}
		}

	}
	
	else{
		header("location:adminlogin.php");
		exit();
	}
	

?>