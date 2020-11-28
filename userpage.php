<?php     
ob_start();
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    else
    {
        session_destroy();
        session_start(); 
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="user_page_style.css">

</head>
<body>
    <div id="container">
    <h1><?php echo "Welcome ".$_SESSION["username"]; ?></h1>
        <?php
            $colors = [
                "zold" => "green",
                "piros" => "red",
                "sarga" => "yellow",
                "kek" => "blue",
                "fekete" => "black",
                "feher" => "white",
            ];

            $link = mysqli_connect("localhost", "id15533217_admin", "7rmX2@9u@?s(U26e") or die ("Can't connect to database server");
            mysqli_select_db($link,"id15533217_adatok") or die ("Can't select database");

            $sql = "select Titkos from tabla where Username='".$_SESSION["username"]."';" ; 

            $query = mysqli_query($link,$sql) ;
            if (mysqli_errno($link) ==0)
            {     
                $fav_color = mysqli_fetch_row( $query )[0];
                echo "<p class='colorLabel'>Your favourite color is ".$colors[$fav_color]."</p>";
                echo "<svg id='colorBox' width='400' height='110'><rect width='300' height='100' style='fill:".$colors[$fav_color].";stroke-width:0;stroke:rgb(0,0,0)'/></svg>";
            }
            else
            {echo mysqli_error($link) ;} 

        ?>
        </div>
</body>
</html>

<?php   
    ob_end_flush();
?>