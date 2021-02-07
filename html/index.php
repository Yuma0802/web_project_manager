<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Web Project Management</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/login.css">
  </head>
  <body>
  <?php require_once '../php/common.php';?>
    <!-- ヘッダー -->
    <header>
      <h1>Web Project Management</h1>
    </header>
    <!-- ヘッダー -->

    <div class="wrapper">
      <!--ログイン-->
      <section id=login class=login>
        <h1>LOGIN</h1>
        <form action="../php/login.php" method="post">
          <p><input type="text" name="id" placeholder="ID" class=input></p>
          <p><input type="password" name="password" placeholder="password" class=input></p>

          <p><input type="submit" value="Login" class=button id="btn_login"><input type="button" value="To Create new Account" class=button id="btn_create"></p>
        </form>
        <div class="margin"></div>
      </section>
      <!--ログイン-->

      <!--アカウント作成-->
      <section id="create_acc" class="create_acc">
        <h1>Create new Account</h1>
        <form action="../php/makeacc.php" method="post">
          <p><input type="text" name="newID" placeholder="create ID" class=input></p>
          <p><input type="password" name=newPassword_A placeholder="create password" class=input></p>
          <p><input type="password" name=newPassword_B placeholder="again password" class=input></p>
         
          <p><input type="button" value="To Login" class=button id="btn_login2"><input type="submit" value="Create" class=button id="btn_create2"></p>
        </form>
      </section>
      <!--アカウント作成-->

      <!-- erro表示-->
      <section id='error_A' class='error'>
        <h1>ATTENTION</h1>
        <P>必要事項を入力してください。</P>
        <input type='button' value='back' class='back' id="errorA_btn">
      </section>
      <section id='error_B' class='error'>
        <h1>ATTENTION</h1>
        <P>IDが重複しています。</P>
        <input type='button' value='back' class='back' id="errorB_btn">
      </section>
      <section id='error_C' class='error'>
        <h1>ATTENTION</h1>
        <P>passwordが一致していません。</P>
        <input type='button' value='back' class='back' id="errorC_btn">
      </section>
      <section id='info' class='error'>
        <h1>INFORMATION</h1>
        <P>アカウントが作成されました。</P>
        <input type='button' value='back' class='back' id="info_btn">
      </section>
      <!-- erro表示-->
    </div>

    <?php
    $file='../js/bord.json';

    $json=json_decode(file_get_contents($file));
    ?>

    <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function() {
        let loginorcreate = new LoginOrCreate();

        let miss = <?php echo $json; ?>;

        indexIdMember.create.style.display = 'none';
        indexIdMember.error_A.style.display = 'none';
        indexIdMember.error_B.style.display = 'none';
        indexIdMember.error_C.style.display = 'none';
        indexIdMember.info.style.display = 'none';

        if (miss === 1) {
          indexIdMember.login.style.display = 'none';
          indexIdMember.error_A.style.display = 'block';
        }
        if (miss === 2) {
          indexIdMember.login.style.display = 'none';
          indexIdMember.error_B.style.display = 'block';
        }
        if (miss === 3) {
          indexIdMember.login.style.display = 'none';
          indexIdMember.error_C.style.display = 'block';
        }
        if (miss === 4) {
          indexIdMember.login.style.display = 'none';
          indexIdMember.info.style.display = 'block';
        }

        indexIdMember.createBtn.addEventListener('click', function() {
          loginorcreate.clickedCreate();
        }, false);
        indexIdMember.loginBtn.addEventListener('click', function() {
          loginorcreate.clickedLogin();
        }, false);
        indexIdMember.createBtn2.addEventListener('click', function() {
          loginorcreate.clickedCreate();
        }, false);
        indexIdMember.loginBtn2.addEventListener('click', function() {
          loginorcreate.clickedLogin();
        }, false);

        indexIdMember.errorABtn.addEventListener('click', function() {
          loginorcreate.clickedBack();
        }, false);
        indexIdMember.errorBBtn.addEventListener('click', function() {
          loginorcreate.clickedBack();
        }, false);
        indexIdMember.errorCBtn.addEventListener('click', function() {
          loginorcreate.clickedBack();
        }, false);
        indexIdMember.infoBtn.addEventListener('click', function() {
          loginorcreate.clickedBack();
        }, false);

      }, false);
    </script>

    <script type="text/javascript" src="../js/obj.js"></script>
    <script type="text/javascript" src="../js/fn.js"></script>

    <?php
    $miss = 0;
    file_put_contents($file,json_encode($miss));
    ?>
    </body>
</html>

<!-- The creator of this code is Itou Yuuma and Kojima Naoyuki -->