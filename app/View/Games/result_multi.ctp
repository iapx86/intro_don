<div id="main">
    <h1>
        <?php echo $this->Html->link($this->Html->image('title.png'),array('controller'=>'/'),array('escape'=>false));?>
    </h1>
    <div id="box_result">
        <div id="ranking">
            <h2><?php echo $this->Html->image('img_ranking.png');?></h2>
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <th>順位</th>
                    <th>ユーザー名</th>
                    <th>正解数</th>
                    <th>スコア</th>
                </tr>
                <?php for ($i = 0; $i < count($ranker); $i++): ?>
                    <tr>
                        <td>
                            <?php
                            if($i === 0){
                                $ranknum = 1;
                                echo $this->Html->image('img_rank1.png');
                            }elseif($ranker[$i -1]['sumScore'] === $ranker[$i]['sumScore']){

                                if($ranknum === 1){
                                    echo $this->Html->image('img_rank1.png');
                                } elseif ($ranknum === 2){
                                    echo $this->Html->image('img_rank2.png');
                                } elseif ($ranknum === 3){
                                    echo $this->Html->image('img_rank3.png');
                                } else{
                                    echo $ranknum;
                                }
                            }else{
                                $ranknum ++;
                                if ($ranknum === 2){
                                    echo $this->Html->image('img_rank2.png');
                                } elseif ($ranknum === 3){
                                    echo $this->Html->image('img_rank3.png');
                                } else{
                                    echo $ranknum;
                                }
                            }
                            ?></td>

                        <td class="name"><?php echo $ranker[$i]['username']; ?></td>

                        <td><?php echo $ranker[$i]['countCorrect']; ?></td>

                        <td <?php if($ranknum === 1){ echo 'class="score"'; }?>><span><?php echo $ranker[$i]['sumScore']; ?></span></td>

                    </tr>
                <?php endfor; ?>
            </table>
        </div>

        <p id="show_detail">曲の正誤表を見る</p>
        <div id="detail_song" style="display: none;">
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <th>曲目</th>
                    <th>曲名 / アーティスト</th>
                    <th>正誤</th>
                </tr>

                <?php for ($count = 0, $i = 1; $i <= MAX_QUESTION; $i++): ?>
                    <tr>
                        <td><?php echo $i; ?><span class="list"></span></td>
                        <td><p class="song_name"><?php echo $songs[$i]['Song']['title']; ?></p><?php echo $songs[$i]['Song']['artist']; ?></td>
                        <?php for ($j=0; $j <= 4; $j++): ?>
                            <?php if (isset($ranker[$j]) && $ranker[$j]['id'] === $auth['id']): ?>

                                <?php if ($ranker[$j]['correct'][$i - 1]): ?>
                                    <td class="cell_result true">○</td>
                                    <?php $count++; ?>
                                <?php else: ?>
                                    <td class="cell_result false">×</td>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endfor; ?>

                    </tr>
                <?php endfor; ?>
            </table>
        </div>

                <p id="text"><?php echo MAX_QUESTION; ?>問中<span><?php echo $count; ?></span>問正解！</p>

        <p id="btn_more"><?php echo $this->Html->link(__('もう一度遊ぶ'), array('action' => 'start')); ?></p>
        <p id="btn_leave"><?php echo $this->Html->link(__('やめる'), array('controller' => 'users', 'action' => 'logout')); ?></p>
    </div>
</div>

<script>
    $(function(){
        $("#show_detail").on("click", function() {
            $("#detail_song").slideToggle();
            $(this).toggleClass("active");
        });
    });
</script>