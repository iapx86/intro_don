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
<div id="main">
    <h1>♪イントロドン♪<span>～曲を聴いて曲名を当てよう！～</span></h1>
    <div id="wrap_answer">
        <form action="question.php" method="post">
            <p class="judge_text">正解！</p>
            <p class="judge_img correct">◎</p>
            <p class="judge_img wrong">×</p>
            <p><img src="http://is2.mzstatic.com/image/thumb/Music49/v4/6c/85/8b/6c858bfc-3f37-e49f-b945-0ec7e595e652/source/100x100bb.jpg"></p>
            <p class="correct_answer">ボーイフレンド<span>aiko</span></p>
            <p class="next"><input type="submit" value="次へ"></p>
        </form>
    </div>
</div>

</body>
</html>