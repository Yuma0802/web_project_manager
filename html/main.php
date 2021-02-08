<?php 
require_once '../php/common.php';
require_once '../php/calender.php';
session_start();

?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Web Project Management</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/join.css">
    <link rel="stylesheet" href="../css/minutes.css">
    <link rel="stylesheet" href="../css/idead.css">
    <link rel="stylesheet" href="../css/document.css">
    <link rel="stylesheet" href="../css/settings.css">
  </head>
  <body>
    <!-- ヘッダー -->
    <header>
      <h1>Web Project Management</h1>
      <h2>ようこそ<?=$_SESSION['accunt']['ID'] ?>さん</h2>
      <h2 id="joinProject" class="joinProject">TJHS</h2>
    </header>
    <!-- ヘッダー -->


    <!-- wrapper -->
    <div class="wrapper">

      <!-- メッセージ -->
      <section id="msg">
      </section>
      <!-- メッセージ -->

      <!-- サイドバー -->
      <aside>
        <ul>
          <li class="current side" id="btn_home">HOME</li>
          <li class="side" id="btn_join">JOIN</li>
          <li class="side" id="btn_minutes">MINUTES</li>
          <li class="side" id="btn_idead">IDEAD</li>
          <li class="side" id="btn_document">DOCUMENT</li>
          <li class="side" id="btn_settings">SETTINGS</li>
        </ul>
      </aside>
      <!-- サイドバー -->

      <!-- mainコンテンツ -->
      <section id="main">

        <div id="main_home">
          <h2>HOME</h2>
          <div class="text_in">
            <p>Web Project Managementへようこそ！</p>
            <p>今日のあなたの日程をお伝えします。</p>
          </div>
          <div class="day_big_box">
            <h3><?php print $now->format('m/d'); ?></h3>
          </div>
          <div class="todo_box">
            <h3>TODO</h3>
            <ul>
              <li>aaaaaaaaaaaa</li>
              <li>aaaaaaaaaaaa</li>
              <li>aaaaaaaaaaaa</li>
              <li>aaaaaaaaaaaa</li>
            </ul>
          </div>
          <h2>CALENDAR</h2>
          <div class="day_box_wrapper">
            <div class="day_month_bar">
              <a href="?ym=<?php echo $prev; ?>"> < </a> <h3 class="bar_month"><?= $html_title; ?></h3> <a href="?ym=<?php echo $next; ?>"> > </a>
            </div>
            <?php
              
              $weeks = makeCale($ym);
                foreach ($weeks as $week) {
                    echo $week;
                }
            ?>


            <!-- <div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div>
            <div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div>
            <div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div>
            <div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div>
            <div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div><div class="day_box"></div> -->
          </div>
          <form class="text_in" action="" method="post">
            <h3>編集する</h3>
            <dl>
              <dt>TODOリスト追加</dt><dd><input type="text" name="" value=""></dd>
            </dl>
            <!-- <p class="inline">選択日</p> -->
            <select name="dayList">
              <option value="1">1日</option>
              <option value="2">2日</option>
              <option value="3">3日</option>
              <option value="4">4日</option>
            </select>
            <input type="submit" name="" value="登録">
          </form>
          <div class="margin"></div>
        </div>

        <div id="main_join">
          <h2>JOIN</h2>
          <h3>招待を受けているプロジェクト</h3>
          <ul>
            <li>TJHS</li>
            <li>～～～～</li>
            <li>～～～～</li>
          </ul>
          <h3>プロジェクトの参加メンバー</h3>
          <p>～～～～</p>
          <p>～～～～</p>
          <p>～～～～</p>
          <h3>招待コードを送る</h3>
          <form class="" action="" method="post">
            <dl>
              <dt>USER ID</dt>
              <dd><input type="text" name="" value="" placeholder="数字6桁"></dd>
            </dl>
            <input type="submit" name="" value="招待" id="submit_join">
          </form>
          <div class="margin"></div>
        </div>

        <div id="main_minutes">
          <h2>MINUTES</h2>
          <div id="minutes_thread"></div>
          <form class="minutes_input_area" action="../php/minutes.php" method="post">
            <textarea name="minu" rows="12" cols="80" placeholder="議事録を記入"></textarea>
            <input type="submit" name="" value="送信" id="submit_minutes">
          </form>

          <?php 
          $countD = 10;
          $db = getDb();
          foreach ($db->query("select * from minutes ORDER BY num DESC LIMIT 0,".$countD.";") as $rowMinutes) {
            echo '<div class="minutes_text_area">';
              echo '<h3>', $rowMinutes['day'], '</h3>';
              echo '<p>',$rowMinutes['contents'],'</p>';
              echo '<h4 class="name">',$rowMinutes['name'],'</h4>';
            echo '</div>';
          } 
          ?>
          <!-- <div class="minutes_text_area">
            <h3>2020/10/18</h3>
            <p>
              <h1>aaaaaaaa</h1>
              内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
            </p>
            <h4 class="name">名前名前名前</h4>
          </div> -->

          <!-- <div class="minutes_text_area"> -->
            <!-- このクラスの中に書けば議事録のスタイルに -->
            
            <!-- <h3>2020/10/18</h3>
            <p>内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容</p>
            <h4 class="name">名前名前名前</h4> -->
            
          <!-- </div> -->
        </div>

        <div id="main_idead">
          <h2>IDEAD</h2>
          <div id="idead_thread"></div>
          <form class="idead_input_area" action="../php/idead.php" method="post">
            <textarea name="idea" rows="12" cols="80" placeholder="アイデアを記入"></textarea>
            <input type="submit" name="" value="送信" id="submit_idead">
          </form>
          
          <!-- このクラスの中に書けばアイデアのスタイルに -->
          <?php 
          $db = getDb();
          foreach ($db->query('select * from idead ORDER BY num DESC') as $rowIdead){
            echo '<div class="idead_text_area">';
              echo '<h3>', $rowIdead['day'], '</h3>';
              echo '<p>',$rowIdead['idea'],'</p>';
              echo '<h4 class="name">',$rowIdead['name'],'</h4>';
            echo '</div>';
          }
          ?>

          <!-- <h3>2020/10/18</h3>
          <p>内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容</p>
          <h4 class="name">名前名前名前</h4> -->

        </div>

        <!-- <div class="idead_text_area">
          このクラスの中に書けばアイデアのスタイルに
          <h3>2020/10/18</h3>
          <p>内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容</p>
          <h4 class="name">名前名前名前</h4>
        </div> -->

        <div id="main_document">
          <h2>DOCUMENT</h2>
          <h3 id="file_btn" class="current_file_url">FILE</h3>
          <h3 id="url_btn">URL</h3>

          <div id="file_document">
            <div id="file_thread"></div>
            <form action="../php/file.php" method="post" enctype="multipart/form-data" class="up_area">
              <dl>
                <dt><input type="file" name="fname"></dt>
                <dt>コメント</dt>
                <dd><input type="text" name="coment" value=""></dd>
              </dl>
              <input type="submit" value="アップロード">
            </form>

            <div class="file_area">
              <!-- このクラスの中に書けばドキュメントのスタイルに -->

              <?php 
              $db = getDb();
              foreach ($db->query('select * from doc1 ORDER BY num DESC') as $rowDoc1){

              echo '<h3>', $rowDoc1['day'], '</h3>';
              echo '<h3><i>&#x21E3;</i><a href="',$rowDoc1['file'],'">',$rowDoc1['file'],'</a></h3>';
              echo '<p>',$rowDoc1['coment'],'</p>';
              echo '<h4 class="name">',$rowDoc1['name'],'</h4>';
              }
            ?>

              <!-- <h3><i>&#x21E3;</i>test.txt</h3>
              <p>コメントコメントコメントコメント</p>
              <h4 class="name">名前名前名前</h4> -->

            </div>

            <!-- <div class="file_area">
              このクラスの中に書けばドキュメントのスタイルに
              <h3><i>&#x21E3;</i>test.txt</h3>
              <p>コメントコメントコメントコメント</p>
              <h4 class="name">名前名前名前</h4>
            </div> -->

          </div>

          <div id="url_document">
            <div id="url_thread"></div>
            <form class="up_area" action="../php/url.php" method="post">
              <dl>
                <dt>URL</dt>
                <dd><input type="text" name="url" value=""></dd>
                <dt>補足説明</dt>
                <dd><textarea name="exp" rows="4" cols="20"></textarea></dd>
              </dl>
              <input type="submit" name="" value="送信" id="submit_url">
            </form>

              <?php 
              $db = getDb();
              foreach ($db->query('select * from doc2 ORDER BY num DESC') as $rowDoc2){
              echo '<div class="url_area">';
              echo '<h3>', $rowDoc2['day'], '</h3>';
              echo '<h3><i>&#x21E2;</i><a href="',$rowDoc2['url'],'">',$rowDoc2['url'],'</a></h3>';
              echo '<p>',$rowDoc2['explanation'],'</p>';
              echo '<h4 class="name">',$rowDoc2['name'],'</h4>';
              echo '</div>';
              }
            ?>

            <!-- <div class="url_area">
              このクラスの中に書けばドキュメントのスタイルに
              <h3><i>&#x21E2;</i><a href="https://www.colordic.org/">https://www.colordic.org/</a></h3>
              <p>コメントコメントコメントコメントコメント</p>
              <h4 class="name">名前名前名前</h4>
            </div> -->

          </div>
        </div>

        <div id="main_settings">
          <h2>SETTINGS</h2>
          <form action="" method="post">
            <dl>
              <dt><h3 class="settings_text_box">Your User Id</h3></dt>
              <dd><h3 class="settings_text_box">123456</h3></dd>
              <dt><h3 class="settings_text_box">BackGroundColor</h3></dt>
              <dd><h3 class="color_change_box color_change_box_current" id="black_btn">BLACK</h3><h3 class="color_change_box" id="white_btn">WHITE</h3></dd>
              <dt><h3 class="settings_text_box">ChangeUserName</h3></dt>
              <dd><h3 class="settings_text_box"><input type="text" name="" value="～～～"></h3></dd>
            </dl>
            <input type="submit" name="" value="設定" id="submit_settings">
          </form>
          <div class="margin"></div>
        </div>

      </section>
      <!-- mainコンテンツ -->
    </div>
    <!-- wrapper -->

    <!-- フッター -->
    <footer id="footer">
      <h3>&copy;WebProjectManagement (2020)</h3>
    </footer>
    <!-- フッター -->

    <script type="text/javascript" src="../js/global_var.js"></script>
    <script type="text/javascript" src="../js/obj.js"></script>
    <script type="text/javascript" src="../js/fn.js"></script>
    <script type="text/javascript" src="../js/common.js"></script>
  </body>
</html>

<!-- The creator of this code is Kojima Naoyuki -->