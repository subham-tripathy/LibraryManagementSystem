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
            <a href="bookList.php" class="active">Book List</a>
            <a href="addABook.php">Add A Book</a>
            <a href="issueReturn.php">Issue or Return a Book</a>
            <a href="users.php">Users List</a>
            <a href="logOut.php">Log Out</a>
        </div>
        <div class="menu-result">
            <h2 style="margin: 0; padding: 0;">BOOK LIST PAGE</h2>
            <input type="search" name="searchBooks" id="searchBooks" placeholder="Seach A Book" />
            <div class="bookList">
            <?php
            
            $qry = "select * from books";
            $result = mysqli_query($conn, $qry);
            $result = $result->fetch_All();
            echo '
                <script>
                    let bookList = [];
                </script>
            ';
            foreach ($result as $x){
                echo '
                <script>
                    bookList.push("'.strtolower($x[0]).'");
                </script>
                <div class="book '.str_replace(' ','-',strtolower($x[0])).'">
                    <img src="data:image/jpg;characterset=utf8;base64,'.base64_encode($x[1]).'">
                    <p>'.$x[0].'</p>
                </div>
                ';
            }
            
            echo '
            <script>
            let resultBox = document.getElementsByClassName("menu-result")[0];
            let input = document.querySelector("#searchBooks");
            input.addEventListener("keyup", ()=>{
                let result = bookList.filter(elem => elem.toLowerCase().includes(input.value));
                let bookDiv = document.getElementsByClassName("book");
                for(x in bookDiv){
                    bookDiv[x].style.display = "none";
                    for (y in result){
                        if(bookDiv[x].classList[1].replaceAll("-", " ") == result[y]){
                            bookDiv[x].style.display = "block";
                            // console.log("YESS");
                        }
                        else{
                            // console.log("NO");
                        }
                    }
                }
            });
            </script>
            ';
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