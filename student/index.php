<?php
require_once('../dbconn.php');
if (isset($_COOKIE["loginType"])){
    $qry = "select * from user where userId = '".$_COOKIE["id"]."'";
    $result = mysqli_query($conn, $qry);
    $result = $result->fetch_assoc();
    // echo gettype($result);
    // echo $result['Name'];
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>ADMIN PANEL</title>
</head>
<body>
    <div class="nav">
		<h1>Library Management System</h1>
	</div>


    <div class="menu">
        <div class="side-menu">
            <a href="index.php" class="active">Home</a>
            <a href="bookList.php">Book List</a>
            <a href="logOut.php">Log Out</a>
        </div>
        <div class="menu-result">
            <p class="acc_info icon">
                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" style="height: 200px;">
            </p>
            <p class="acc_info name">
                <span><?php echo $result['name'];?></span>
            </p>
            <div style="width: 100%; text-align: left; margin-top: 50px; font-size: 30px;">
                <p class="acc_info email">EMAIL: 
                    <span style="margin-left: 10px; font-size: 23px;"><?php echo $result['emailID'];?></span>
                </p>
                <p class="acc_info phno">Phone No: 
                    <span style="margin-left: 10px; font-size: 23px;"><?php echo $result['mobNo'];?></span>
                </p>
            </div>
        </div>
    </div>






    <script src="script.js"></script>
</body>
</html>


<?php
}
else{
    echo '<script>
    // alert("Log In First !!!");
    window.location.replace("../");
    </script>';
}


?>