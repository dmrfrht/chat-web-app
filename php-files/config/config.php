<?php

$conn = mysqli_connect("localhost", "root", "", "ajax-chat-app");
if (!$conn) {
  echo "Database connected" . mysqli_connect_error();
}
