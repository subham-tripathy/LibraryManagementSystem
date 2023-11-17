<?php
require('../dbconn.php');
if (isset($_COOKIE["loginType"])){
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
            <a href="index.php">Home</a>
            <a href="bookList.php">Book List</a>
            <a href="addABook.php">Add A Book</a>
            <a href="issueReturn.php">Issue or Return a Book</a>
            <a href="editAccount.php" class="active">Edit Account</a>
            <a href="logOut.php">Log Out</a>
        </div>
        <div class="menu-result">
            <h2>EDIT ACCOUNT PAGE</h2>
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