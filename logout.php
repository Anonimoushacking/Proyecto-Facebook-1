<?php

session_start();
session_destroy();
header("location:index.php?session_destroy=1");

?>
