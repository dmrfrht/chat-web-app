<?php include_once 'includes/header.php' ?>
<body>
<div class="wrapper">
  <section class="form login">
    <header>Sohbet Uygulaması</header>

    <form action="#" autocomplete="off">
      <div class="error-txt"></div>
      <div class="field input">
        <label>E-posta Adresiniz</label>
        <input type="text" placeholder="E-posta adresinizi giriniz.." name="email">
      </div>
      <div class="field input">
        <label>Şifreniz</label>
        <input type="password" placeholder="Şifrenizi giriniz.." name="password">
        <i class="fas fa-eye"></i>
      </div>
      <div class="field button">
        <input type="submit" value="Sohbete Devam Et">
      </div>
    </form>
    <div class="link">Henüz kaydolmadınız mı? <a href="index.php">Şimdi üye Ol</a></div>
  </section>
</div>

<script src="../template/js/pass-show-hide.js"></script>
<script src="../template/js/login.js"></script>
</body>
</html>
