<?php
    $item_id = $_GET["id"];
    $user_id = null;

    if(isset($_COOKIE["shop_cookie"])){
        $user_id = $_COOKIE["shop_cookie"];        
    }
    else{
        header('Location: ../music.html');    
    }

    $connect = mysqli_connect("ephesus.cs.cf.ac.uk","c1312579","berlin","c1312579");
    mysqli_query($connect, "DELETE FROM Basket");

    mysqli_close($connect);
    header('Location: ./Main_PHP/basket.php');

?>