<?php
session_start();
unset($_SESSION['validUser']);
session_unset();
session_regenerate_id();
session_destroy();
header('location:login.php');
