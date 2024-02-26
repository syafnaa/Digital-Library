<?php
session_start();
session_destroy();
header('location:../authentication/form.php');
?>