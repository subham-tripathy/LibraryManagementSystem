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
            <a href="addABook.php" class="active">Add A Book</a>
            <a href="issueReturn.php">Issue or Return a Book</a>
            <a href="users.php">Users List</a>
            <a href="logOut.php">Log Out</a>
        </div>
        <div class="menu-result">
            <h2>ADDING BOOK PAGE</h2>
            <div class="bookForm">
                <form action="addABook.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="bookname" id="bookname" placeholder="Enter Book Name">
                    <label for="coverpic">Upload Cover Pic</label>
                    <input type="file" name="coverpic" id="coverpic" accept="image/*">
                    <input type="number" name="quantity" id="quantity" placeholder="Enter Quantity">
                    <input type="submit" value="Add This Book" name="addbookBTN">
                </form>






<?php

if (isset($_POST['addbookBTN'])){
    $bookNAME = $_POST['bookname'];
    $imageDATA = addslashes(file_get_contents($_FILES["coverpic"]["tmp_name"]));
    $quantity = $_POST['quantity'];
    
    $qry = "insert into books values ('$bookNAME', '$imageDATA','$quantity')";
    mysqli_query($conn, $qry);
}



?>







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