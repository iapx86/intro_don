<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2016/10/06
 * Time: 11:27
 */

?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>イントロドン！</title>
    <link href="css/set.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>
<body>
<div id="main" class="page_start">
    <h1>♪イントロドン♪<span>～曲を聴いて曲名を当てよう！～</span></h1>
    <h2>こんにちは！<span>○○○</span>さん！</h2>
    <p class="btn1"><a href="question.php">遊ぶ</a></p>
    <p class="btn2">説明</p>
    <div id="text">
        説明が入ります。説明が入ります。説明が入ります。<br>
        説明が入ります。説明が入ります。説明が入ります。<br>
        説明が入ります。説明が入ります。説明が入ります。<br>
        説明が入ります。説明が入ります。説明が入ります。<br>
        説明が入ります。説明が入ります。説明が入ります。<br>
        説明が入ります。説明が入ります。説明が入ります。<br>
    </div>
</div>

<script>
    $(".btn2").click(function(){
        $("#text").fadeToggle();
    });
</script>
</body>
</html>