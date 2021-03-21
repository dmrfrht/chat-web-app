<?php
  include_once "../config/config.php";
  $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
  $output = "";
  $sql = mysqli_query($conn, "select * from users where full_name like '%{$searchTerm}%' or last_name like '%{$searchTerm}%'");
  if (mysqli_num_rows($sql) > 0) {
    include 'list-item.php';
  } else {
    $output .= 'Arama teriminizle ilgili kullanıcı bulunamadı..';
  }

  echo $output;
