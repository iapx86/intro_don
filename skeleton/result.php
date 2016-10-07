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
    <div id="box_result">
        <h2>結果発表</h2>
        <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <th>曲目</th>
                <th>曲名</th>
                <th>アーティスト</th>
                <th>正誤</th>
            </tr>
            <tr>
                <td>1曲目</td>
                <td>TSUNAMI</td>
                <td>サザンオールスターズ</td>
                <td class="cell_result true">○</td>
            </tr>
            <tr>
                <td>2曲目</td>
                <td>TSUNAMI</td>
                <td>サザンオールスターズ</td>
                <td class="cell_result false">×</td>
            </tr>
            <tr>
                <td>3曲目</td>
                <td>TSUNAMI</td>
                <td>サザンオールスターズ</td>
                <td class="cell_result true">○</td>
            </tr>
            <tr>
                <td>4曲目</td>
                <td>TSUNAMI</td>
                <td>サザンオールスターズ</td>
                <td class="cell_result true">○</td>
            </tr>
            <tr>
                <td>5曲目</td>
                <td>TSUNAMI</td>
                <td>サザンオールスターズ</td>
                <td class="cell_result true">○</td>
            </tr>
            <tr>
                <td>6曲目</td>
                <td>TSUNAMI</td>
                <td>サザンオールスターズ</td>
                <td class="cell_result false">×</td>
            </tr>
            <tr>
                <td>7曲目</td>
                <td>TSUNAMI</td>
                <td>サザンオールスターズ</td>
                <td class="cell_result true">○</td>
            </tr>
            <tr>
                <td>8曲目</td>
                <td>TSUNAMI</td>
                <td>サザンオールスターズ</td>
                <td class="cell_result false">×</td>
            </tr>
            <tr>
                <td>9曲目</td>
                <td>TSUNAMI</td>
                <td>サザンオールスターズ</td>
                <td class="cell_result true">○</td>
            </tr>
            <tr>
                <td>10曲目</td>
                <td>TSUNAMI</td>
                <td>サザンオールスターズ</td>
                <td class="cell_result true">○</td>
            </tr>
        </table>
        <p id="text">10問中<span>6</span>問正解</p>
        <p id="btn_more"><a href="question.php">もう一度遊ぶ</a></p>
        <p id="btn_leave"><a href="start.php">やめる</a></p>
    </div>
</div>
</body>
</html>