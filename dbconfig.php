<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "Utenti");

$db_conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

if ($db_conn->connect_error) {
    die("Connection failed: ".$db_conn->connect_error);
};
?>
