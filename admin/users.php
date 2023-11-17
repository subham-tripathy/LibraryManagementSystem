<?php
require_once('../dbconn.php');
if (isset($_COOKIE["loginType"])){
    $qry = "select * from user;";
    $result = mysqli_query($conn, $qry);
    $result = $result->fetch_all();
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
            <a href="users.php" class="active">Users List</a>
            <a href="logOut.php">Log Out</a>
        </div>
        <div class="menu-result" style="overflow: auto;">
        <h1>USERS</h1>
            <table>
                <tbody>
                    <tr>
                        <th>Id/Roll No</th>
                        <th>Name</th>
                        <th>User Type</th>
                        <th>Email</th>
                        <th>Phone No</th>
                    </tr>
                    <?php
                foreach($result as $x){
                    echo "<tr>";
                    echo "<td>".$x[0]."</td>";
                    echo "<td>".$x[1]."</td>";
                    echo "<td>".$x[2]."</td>";
                    echo "<td>".$x[3]."</td>";
                    echo "<td>".$x[4]."</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>






    <script src="script.js"></script>
</body>
</html>


<?php
}
else{
  header("Location: form.php");
}


?>