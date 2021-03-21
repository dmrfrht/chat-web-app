<?php
  session_start();
  if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
  }
?>

<?php include_once 'includes/header.php' ?>

<body>
<div class="wrapper">
  <section class="users">
    <header>
      <?php
        include_once "config/config.php";
        $sql = mysqli_query($conn, "select * from users where unique_id = {$_SESSION['unique_id']}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        }
      ?>
      <div class="content">
        <img src="../template/images/<?= $row['img'] ?>" alt="">
        <div class="details">
          <span><?= $row['full_name'] . ' ' . $row['last_name']?></span>
          <p><?= $row['status'] ?></p>
        </div>
      </div>
      <a href="#" class="logout">Çıkış yap</a>
    </header>
    <div class="search">
      <span class="text">Sohbete başlamak için bir kullanıcı seçin</span>
      <input type="text" placeholder="Aranacak adı girin ..">
      <button><i class="fas fa-search"></i></button>
    </div>
    <div class="users-list"></div>
  </section>
</div>

<script src="../template/js/users.js"></script>
</body>
</html>
