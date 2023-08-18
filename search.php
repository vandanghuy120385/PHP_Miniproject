<?php
$mod = "movie" ;
$act = "search";
$name = $_GET['name'];
header("location:index.php?mod =" . $mod . "&act=" . $act . "&name=" . $name);
?>