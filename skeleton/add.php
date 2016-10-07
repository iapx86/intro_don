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
</head>
<body>
<div id="main">
    <h1>♪イントロドン♪<span>～曲を聴いて曲名を当てよう！～</span></h1>
    <div id="wrap_login">
        <h2>アカウントを作成</h2>
        <form action="login.php" method="post">
            <p><input type="text" name="id" placeholder="名前"></p>
            <p><input type="text" name="pass" placeholder="合言葉"></p>
            <p class="btn1"><input type="submit" value="登録する"></p>
        </form>
    </div>
</div>
</body>
</html>