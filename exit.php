<?php
require("db_connection.php");
session_start();
if (isset($_SESSION["client"])) {
	unset($_SESSION["client"]);
	header("Location: main.php");
}
?>