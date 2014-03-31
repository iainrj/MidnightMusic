<?php
    
    $connect = mysqli_connect("ephesus.cs.cf.ac.uk","c1312579","berlin","c1312579");
    // Code from Will's cookie script
    $item_id = $_GET["id"];
    $user_id = null;

    if(isset($_COOKIE["shop_cookie"])){
        $user_id = $_COOKIE["shop_cookie"];        
    }
    else{
        $user_id = uniqid();
    }

    mysqli_query($connect, "INSERT INTO Basket VALUES(
                        '$user_id',
                        $item_id
                        )");
    mysqli_close($connect);

   setcookie("shop_cookie", $user_id);   
   header('Location: ' . $_SERVER['HTTP_REFERER']); // Return the user to the last page visited
?>