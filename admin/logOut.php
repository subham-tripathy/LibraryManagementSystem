<?php




if (isset($_COOKIE['loginType'])){
    setcookie("loginType", 0, time() - (86400), "/");
    echo '<script>
        alert("LOGGED OUT!!!");
        window.location.replace("../");
        </script>';
}
    
else{
    echo '<script>
        alert("Login In First !!!");
        window.location.replace("../");
    </script>';
}




?>