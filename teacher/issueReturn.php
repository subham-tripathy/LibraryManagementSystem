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
    <title>Issue Or Return Page</title>
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
            <a href="issueReturn.php" class="active">Issue or Return a Book</a>
            <a href="logOut.php">Log Out</a>
        </div>
        <div class="menu-result">
            <div id="issue-return" style="position: absolute;">
                <button id="issueBTN" style="cursor: pointer; background-color: gray;">Issue</button>
                <button id="returnBTN" style="cursor: pointer; background-color: gray;">Return</button>
            </div>
            <div class="issue"  style="display: none;">
                <h2>ISSUE PAGE</h2>
                <form action="" method="post">
                    <select name="stuName" id="stuName">
                        <option value="" hidden>Select Student</option>
                        <?php
                            $qry = "select name from user where type = 'student'";
                            $result = mysqli_query($conn, $qry);
                            $result = $result->fetch_all();
                            foreach($result as $x){
                                echo "<option value='".$x[0]."'>".$x[0]."</option>";
                            }
                        ?>
                    </select>
                    <select name="bookName" id="bookName">
                        <option value="" hidden>Select Book</option>
                        <?php
                            $qry = "select name from books;";
                            $result = mysqli_query($conn, $qry);
                            $result = $result->fetch_all();
                            foreach($result as $x){
                                echo "<option value='".$x[0]."'>".$x[0]."</option>";
                            }
                        ?>
                    </select>

                    <input type="submit" name="issueBookBTN" value="Issue Book" style="background-color: gray; width: 10%; margin: auto; padding: 5px;">
                </form>


                <?php
                    if (isset($_POST['issueBookBTN'])){
                        $qry = "insert into issued values('".$_POST['stuName']."', '".$_POST['bookName']."', current_timestamp)";
                        mysqli_query($conn, $qry);
                    }
                ?>

            </div>
            <div class="return">
                <h2>RETURN PAGE</h2>
                <table>
                    <tbody>
                        <tr>
                            <td>Student Name</td>
                            <td>Book Name</td>
                            <td>Time Stamp</td>
                            <td>Return</td>
                        </tr>


                    <?php
                        $qry = "select * from issued";
                        $result = mysqli_query($conn, $qry);
                        $result = $result->fetch_all();
                        foreach ($result as $x){
                            echo "<tr>";
                            echo "<td>".$x[0]."</td>";
                            echo "<td>".$x[1]."</td>";
                            echo "<td>".$x[2]."</td>";
                            echo "<td><a href='return.php?time=".$x[2]."'>Return</a></td>";
                            echo "</tr>";
                        }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>






    <script>
        let issueBTN = document.querySelector("#issueBTN");
        let returnBTN = document.querySelector("#returnBTN");
        returnBTN.addEventListener('click', ()=>{
            document.querySelector("div.issue").style.display = "none";
            document.querySelector("div.return").style.display = "block";
        });
        issueBTN.addEventListener('click', ()=>{
            document.querySelector("div.issue").style.display = "block";
            document.querySelector("div.return").style.display = "none";
        });
    </script>
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