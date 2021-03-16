<?php
session_start();
include_once "../config/config.php";

$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($password)) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $sql = mysqli_query($conn, "select email from users where email = '{$email}'");
    if (mysqli_num_rows($sql) > 0) {
      echo $email . " bu e-posta zaten kayıtlı!";
    } else {
      if (isset($_FILES['image'])) {
        $imgName = $_FILES['image']['name'];
        $imgType = $_FILES['image']['type'];
        $tmpName = $_FILES['image']['tmp_name'];

        $imgExplode = explode('.', $imgName);
        $imgExt = end($imgExplode);

        $extensions = ['png', 'jpeg', 'jpg'];

        if (in_array($imgExt, $extensions) == true) {
          $time = time();
          $newImageName = $time . $imgName;

          if (move_uploaded_file($tmpName, "../../template/images/" . $newImageName)) {
            $status = "Şimdi aktif";
            $randomID = rand(time(), 10000000);

            $sql2 = mysqli_query($conn, "insert into users (unique_id, full_name, last_name, email, password, img, status) 
                                               values ({$randomID}, '{$firstName}', '{$lastName}', '{$email}', '{$password}', '{$newImageName}', '{$status}')");
            if ($sql2) {
              $sql3 = mysqli_query($conn, "select * from users where email = '{$email}'");
              if (mysqli_num_rows($sql3) > 0) {
                $row = mysqli_fetch_assoc($sql3);
                $_SESSION['unique_id'] = $row['unique_id'];

                echo "success";
              }
            } else {
              echo "Bir sorun oluştu. Daha sonra tekrar dene!";
            }
          }
        } else {
          echo "Lütfen geçerli bir profil resmi seçiniz. Geçerli dosya tipleri - .png, .jpeg, .jpg";
        }

      } else {
        echo "Lütfen bir tane profile resmi seçiniz.";
      }
    }
  } else {
    echo $email . " bu geçerli bir e-posta değil!";
  }
} else {
  echo "Tüm giriş alanları zorunludur!";
}
