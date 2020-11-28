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
    <title>Color</title>
    <link rel="stylesheet" href="auth_style.css">
</head>
<body>
<?php


$pswd_file = fopen("./password.txt", "r") or die("Unable to open file!");

$line_buffer = "";
$decoded_line = "";
$key = [5,-14,31,-9,3];
$user_found = false;

while(!feof($pswd_file)) {
    $line_buffer = fgets($pswd_file);

    for ($i = 0; $i < strlen($line_buffer) -1; $i++)
    {
        $decoded_line = $decoded_line . chr( ord( $line_buffer[$i]) - $key[ $i % count($key) ]);
    }
    
    $line_components = preg_split("/[*]/", $decoded_line, -1);

    if($line_components[0] == $_POST['username']){
        $user_found = true;
        if($line_components[1] == $_POST['password']){
            $_SESSION["username"] = $_POST['username'];
            header("Location: https://webappdeik2020.000webhostapp.com/userpage.php");
            session_regenerate_id(true);
        }
        else{
            echo "<h1>Wrong Password<h1>";
            header( "refresh:3; url=http://police.hu" ); 
        }
    }
    $decoded_line = "";
}

if(!$user_found){
    echo "<h1>User Not Found<h1>";
    header( "refresh:3; url=index.php" ); 
}
fclose($pswd_file);
?>

</body>
</html>
<?php   
    ob_end_flush();
?>