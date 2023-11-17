<?php
require_once('../dbconn.php');
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
            <a href="bookList.php" class="active">Book List</a>
            <a href="logOut.php">Log Out</a>
        </div>
        <div class="menu-result">
            <h2>BOOK LIST PAGE</h2>
            <div class="bookList">

            <?php
            
            $qry = "select * from books";
            $result = mysqli_query($conn, $qry);
            $result = $result->fetch_All();
            foreach ($result as $x){
                echo '
                <div class="book">
                    <img src="data:image/jpg;characterset=utf8;base64,'.base64_encode($x[1]).'">
                    <p>'.$x[0].'</p>
                </div>
                ';
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