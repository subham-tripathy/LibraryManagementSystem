<?php



session_start();
if ($_COOKIE["login"] == '1'){
    setcookie("login", '0', time() + (86400), "/");
    header("location: form.php");
}

else{
    echo "<script>
            alert('Log In First');
            window.location.href='form.php';
        </script>";
}
?>