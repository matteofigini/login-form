<?php
$error = "";
include("dbconfig.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = $db_conn->real_escape_string($_POST['email']);
    $mypassword = hash("sha512", $db_conn->real_escape_string($_POST['password']));

    $sql = "SELECT ID, Username FROM Utenti WHERE Email='$myusername' AND Password='$mypassword'";
    $result = $db_conn->query($sql);
    if ($result->num_rows == 1) {
        $record = $result->fetch_assoc();
        $_SESSION["id"] = $record["ID"];
        $_SESSION["name"] = $record["Username"];
        header("location: welcome.php");
    }
    else {
        $error = "Your Login Name or Password is invalid!";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Accedi all'area riservata</title>
        <link rel="stylesheet" href="css/app.css">
    </head>
    <body>
        <body>
           <div align="center">
              <div style="width:300px; border: solid 1px #333333;" align="left">
                 <div style="background-color:#333333; color:#FFFFFF; padding:3px;">
                     <b>Login</b>
                 </div>
                 <div style="margin:30px">
                    <form action="" method="post">
                       <label>E-mail: </label><br>
                       <input type="text" name="email" class="box"><br><br>
                       <label>Password:</label><br>
                       <input type="password" name="password" class="box"><br><br>
                       <input type="submit" value=" Submit "><br><br>
                    </form>
                    <div style="font-size: 11px;">
                        <a href="register.php">Non hai un account? Registrati</a>
                    </div>
                    <div style="font-size: 11px; color: #cc0000; margin-top: 10px"><?php echo $error; ?></div>
                 </div>
              </div>
           </div>
        </body>
    </body>
</html>
