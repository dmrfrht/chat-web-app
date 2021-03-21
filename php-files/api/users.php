<?php
session_start();
include_once '../config/config.php';
$sql = mysqli_query($conn, "select * from users");
$output = "";

if (mysqli_num_rows($sql) == 1) {
  $output .= "Sohbet etmek için uygun kullanıcı yok.";
} else if (mysqli_num_rows($sql) > 0) {
  include 'list-item.php';
}

echo $output;
