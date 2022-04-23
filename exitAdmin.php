<?php
require("db_connection.php");
session_start();
if (isset($_SESSION["admin"])) {
	unset($_SESSION["admin"]);
	header("Location: admin.php");
}
?>