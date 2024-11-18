<?php
require 'config.php';
$_SESSION = [];
session_unset();
session_destroy();

$query = "UPDATE tb_user SET login_status = NULL WHERE login_status IS NOT NULL";
mysqli_query($conn, $query);


header("Location: login.php");
?>