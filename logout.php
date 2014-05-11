<?php
session_start();
session_destroy();
header('location:/wordpress/index.php');
?>