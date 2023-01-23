<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

if (!isset($_SESSION['login'])) {
  header("Location: ../login.php");
}

header("Location: ../login.php");