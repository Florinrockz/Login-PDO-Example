<?php
include_once('sesiuni.php');
session_destroy();
header('location: index.php');
?>