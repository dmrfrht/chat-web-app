<?php include_once 'includes/header.php' ?>
<div class="wrapper">
  <section class="form signup">
    <header>Sohbet Uygulaması</header>

    <form action="#" autocomplete="off" enctype="multipart/form-data">
      <div class="error-txt"></div>
      <div class="name-details">
        <div class="field input">
          <label>Adınız</label>
          <input type="text" placeholder="Adınızı giriniz.." name="firstName" required>
        </div>
        <div class="field input">
          <label>Soyadınız</label>
          <input type="text" placeholder="Soyadınızı giriniz.." name="lastName" required>
        </div>
      </div>
      <div class="field input">
        <label>E-posta Adresiniz</label>
        <input type="text" placeholder="E-posta adresinizi giriniz.." name="email" required>
      </div>
      <div class="field input">
        <label>Şifreniz</label>
        <input type="password" placeholder="Şifrenizi giriniz.." name="password" required>
        <i class="fas fa-eye"></i>
      </div>
      <div class="field image">
        <label>Profil Resminiz</label>
        <input type="file" name="image" required>
      </div>
      <div class="field button">
        <input type="submit" value="Sohbete Devam Et">
      </div>
    </form>
    <div class="link">Zaten üye misiniz? <a href="login.php">Şimdi giriş yap</a></div>
  </section>
</div>

<script src="../template/js/pass-show-hide.js"></script>
<script src="../template/js/sign-up.js"></script>
</body>
</html>
