<?php
$error = "";
include("dbconfig.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = "";
    $username = $db_conn->real_escape_string($_POST["username"]);
    $email = $db_conn->real_escape_string($_POST["email"]);

    if ($_POST["password1"] == $_POST["password2"]) {
        $password = hash("sha512", $db_conn->real_escape_string($_POST["password1"]));
        $sql = "INSERT INTO Utenti (Username, Email, Password) VALUES ('$username', '$email', '$password')";

        if ($db_conn->query($sql) === TRUE) {
            header("location: login.php");
        }
        else {
            $error = "Registrazione fallita. Riprova...";
        }
    }
    else {
        $error = "Le due password non coincidono!";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Registrati</title>
        <link rel="stylesheet" href="css/app.css">
    </head>
    <body>
        <div align="center">
            <div style="width:300px; border: solid 1px #333333;" align="left">
                <div style="background-color:#333333; color:#FFFFFF; padding:3px;">
                    <b>Registrazione</b>
                </div>
                <div style="margin:30px">
                    <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <label>Username: </label><br>
                        <input type="text" name="username" placeholder="Username"><br><br>
                        <label>E-mail: </label><br>
                        <input type="text" name="email" placeholder="E-mail"><br><br>
                        <label>Password: </label><br>
                        <input type="password" name="password1"><br><br>
                        <label>Ripeti la password: </label><br>
                        <input type="password" name="password2"><br><br>
                        <input type="submit" name="" value=" Registrati "><br><br>
                    </form>
                    <div style="font-size: 11px;">
                        <a href="login.php">Torna alla login</a>
                    </div>
                    <div style="font-size: 11px; color: #cc0000; margin-top: 10px"><?php echo $error; ?></div>
                </div>
            </div>
        </div>
    </body>
</html>
