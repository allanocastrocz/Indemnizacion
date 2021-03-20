<?php
session_start();
if (!isset($_SESSION['usuario']))
  Header("Location: signin.php");
else
    Header("Location: indemnizaciones.php");
?>