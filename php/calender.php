<?php 

$now = new DateTime();
// 前月・次月リンクが押された場合は、GETパラメーターから年月を取得
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
  } else {
  // 今月の年月を表示
  $ym = date('Y-m');
  }
  
  // タイムスタンプを作成し、フォーマットをチェックする
  $timestamp = strtotime($ym . '-01');
  if ($timestamp === false) {
     $ym = date('Y-m');
     $timestamp = strtotime($ym . '-01');
  } 

  // カレンダーのタイトルを作成　例）2017年7月
  $html_title = date('Y年n月', $timestamp);
  
  // 前月・次月の年月を取得
  // 方法１：mktimeを使う mktime(hour,minute,second,month,day,year)
  $prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
  $next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
 
function makeCale($ym){
  
    // タイムスタンプを作成し、フォーマットをチェックする
    $timestamp = strtotime($ym . '-01');
    if ($timestamp === false) {
        $ym = date('Y-m');
        $timestamp = strtotime($ym . '-01');
    } 
    
    // 今日の日付 フォーマット　例）2018-07-3
    $today = date('Y-m-j');  
    
    // 該当月の日数を取得
    $day_count = date('t', $timestamp);

    // １日が何曜日か　0:日 1:月 2:火 ... 6:土
    // 方法１：mktimeを使う
    $youbi = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));  

    // カレンダー作成の準備
    $weeks = [];
    $week = '';

    // 第１週目：空のセルを追加
    // 例）１日が水曜日だった場合、日曜日から火曜日の３つ分の空セルを追加する
    $week .= str_repeat('<div class="day_box"></div>', $youbi);

    for ( $day = 1; $day <= $day_count; $day++, $youbi++) {
    
        // 2017-07-3
        $date = $ym . '-' . $day;

        if ($today == $date) {
            // 今日の日付の場合は、class="today"をつける
            $week .= '<div class="day_box" id="'.$day.'">' . $day;
        } else {
            $week .= '<div class="day_box" id="'.$day.'">' . $day;
        }
        $week .= '</div>';

        // 週終わり、または、月終わりの場合
        if ($youbi % 7 == 6 || $day == $day_count) {

        if ($day == $day_count) {
            // 月の最終日の場合、空セルを追加
            // 例）最終日が木曜日の場合、金・土曜日の空セルを追加
            $week .= str_repeat('<div class="day_box" id="'.$day.'"></div>', 6 - ($youbi % 7));
        }

        // weeks配列にtrと$weekを追加する

        $weeks[] = '<tr>' . $week . '</tr>';

        // weekをリセット
        $week = '';
        }
    }  

    return $weeks;


}
?>