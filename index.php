<?php

require_once('dbconn.php');



if (isset($_COOKIE["loginType"])){

        if(strtolower($_COOKIE["loginType"]) == "admin"){
            echo '<script>
                window.location.replace("./admin");
            </script>';
        }
        else if(strtolower($_COOKIE["loginType"]) == "teacher"){
            echo '<script>
                window.location.replace("./teacher");
            </script>';
        }
        else if(strtolower($_COOKIE["loginType"]) == "student"){
            echo '<script>
                window.location.replace("./student");
            </script>';
        }
}
else{




?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Libray Managemnet System</title>
	<link rel="stylesheet" href="style.css">


</head>
<body>
	<div class="nav">
		<h1>Library Management System</h1>
	</div>

	<div class="signUpSignIn">

		<!-- <input class="signInbtn active" type="button" value="Sign In"> -->
		<!-- <input class="signUpbtn" type="button" value="Sign Up"> -->
		
		
		
		<div class="signIn">
			<form action="./" method="post">
				<div>
					<label for="signInUserId">Enter Username:</label>
					<input type="text" name="signInUserId" placeholder="User Id" required>
				</div>
				<div style="margin-bottom: 70px;">
					<label for="signInPassword">Enter Password:</label>
					<input type="password" name="signInPassword" placeholder="Password" required>
				</div>
				<div>
					<input class="signUpbtn" type="button" value="Create an Account" style="margin: auto; margin-bottom: 20px; border-bottom: none;">
				</div>
				<input type="submit" value="Sign In" name="signInSubmit" class="signInSubmit">






<?php

if(isset($_POST['signInSubmit'])){
	$sql = "select * from user where userID = '".$_POST['signInUserId']."'";
	$sqlresult = $conn->query($sql);
	$result = $sqlresult->fetch_assoc();
	
	if ($result != '')
	{
		$userId = $result['userId'];
		setcookie("id", $userId, time()+(86400), "/");
		$password = $result['password'];
		if($password == $_POST['signInPassword'])
		{
			if(strtolower($_POST['signInUserId']) == 'admin'){
				setcookie("loginType", 'admin', time() + (86400), "/");
				setcookie("id", $result['userId'], time() + (86400), "/");
				echo "<script>
						alert('Sign In Success !');
						window.location.href='admin/index.php';
					</script>";

			}
			else if (($result['type'] == 'teacher') || (($result['type'] == 'Teacher'))){
				setcookie("loginType", 'teacher', time() + (86400), "/");
				setcookie("id", $result['userId'], time() + (86400), "/");
				echo "<script>
						alert('Sign In Success !');
						window.location.href='teacher/index.php';
					</script>";
			}
			else if (($result['type'] == 'student') || (($result['type'] == 'Student'))){
				setcookie("loginType", 'student', time() + (86400), "/");
				setcookie("id", $result['userId'], time() + (86400), "/");
				echo "<script>
						alert('Sign In Success !');
						window.location.href='student/index.php';
					</script>";
			}
		}
		
		else{
            echo "<script>alert('Wrong Password !');</script>";
        }
    }
    else{
        echo '<script>alert("User Doesnt Exist! Please Sign Up");</script>';
	}
}

?>













			</form>
		</div>


		
		<div class="signUp">
			<form action="./" method="post">
				<div>
					<label for="userId">Enter Username:</label>
					<input type="text" name="userId" placeholder="User Id" required>
				</div>
				<div>
					<label for="name">Enter Name:</label>
					<input type="text" name="name" placeholder="Name" required>
				</div>
				<div>
					<label for="type">Choose Type:</label>
					<span style="display: flex; align-items: center;">
						<input type="radio" name="type" id="student" value="student" style="margin-right: 10px;">
						<label for="student">Student</label>
					</span>
					<span style="display: flex; align-items: center;">
						<input type="radio" name="type" id="teacher" value="teacher" style="margin-right: 10px;">
						<label for="teacher">Teacher</label>
					</div>
				</span>
				<div>
					<label for="number">Enter Phone Number:</label>
					<input type="number" name="number" placeholder="Phone Number">
				</div>
				<div>
					<label for="email">Enter Email:</label>
					<input type="email" name="email" placeholder="Email">
				</div>
				<div>
					<label for="password">Enter Password:</label>
					<input type="password" name="password" placeholder="Enter Password">
				</div>
				<div>
					<label for="cpassword">Confirm Password:</label>
					<input type="password" name="cpassword" placeholder="Confirm Password">
				</div>
				<div>
					<input class="signInbtn" type="button" value="Have an account? Login In Here" style="margin: auto; margin-bottom: 20px; border-bottom: none;">
				</div>
				<input type="submit" value="Sign Up" name="signUpSubmit" class="signUpSubmit">





			<?php
				if(isset($_POST['signUpSubmit'])){
                    if($_POST['password'] == $_POST['cpassword']){
    					$userId = trim($_POST['userId']);
    					$name = trim($_POST['name']);
    					$type = trim($_POST['type']);
    					$email = trim($_POST['email']);
    					$phno = trim($_POST['number']);
    					$pswd = trim($_POST['password']);
                        
    					$sql = "insert into user values ('".$userId."','".$name."','".$type."','".$email."',".$phno.",'".   $pswd."');";
    					mysqli_query($conn, $sql);

                        if (strtolower($type) == "teacher"){
                            setcookie("loginType", 'teacher', time() + (86400), "/");
                        }

                        if (strtolower($type) == "student"){
                            setcookie("loginType", 'student', time() + (86400), "/");
                        }
                        setcookie("id", $_POST['userId'], time() + (86400), "/");
    					echo "<script>
    							alert('Sign Up Success !');
    							window.location.href='./';
    						</script>";
                    }
                    else{
                        echo '<script>
                        alert("Password and Confirm Password Must be Same");
                        window.location.href="./";
                    </script>';
                    }
				}
			?>













			</form>
		</div>
	</div>
	
	<script src="script.js"></script>
</body>
</html>
<?php




















}










?>
