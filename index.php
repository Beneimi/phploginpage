<?php     
ob_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colors</title>
    <link rel="stylesheet" href="login_style.css">
</head>
<body>

<div id="myData">
<table>
    <tr>
        <td>Név</td>
        <td>Bene Imre Mihály</td>
    </tr>
    <tr>
        <td>Neptun</td>
        <td>YL8NNI</td>
    </tr>
    <tr>
        <td>Jegy</td>
        <td>5</td>
    </tr>
</table>
</div>

    <div id="container">
        <form  action="authentication.php" method="POST">
            <div id="formContainer">
                <div class="inputLabel">Username</div>

                <input class="textInput"  type="text" name="username">

                <div class="inputLabel">Password</div>

                <input class="textInput" type="password" name="password">

                <div id="submitContainer"> <input id="submit" type="submit" value="Login"> </div>
            </div>
        </form>
    </div>
<div id="invisible"></div>

</body>
</html>
<?php   
    ob_end_flush();
?>