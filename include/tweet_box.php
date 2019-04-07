
<?php
    //var_dump($tweetRecord);
    global $tweetRecord;
    //ajax呼び出し用
    if(isset($_POST['newTweet'])){
        $tweetRecord = $_POST['newTweet'];
    }
    $text = $tweetRecord['text'];
    $name = $tweetRecord['name'];
    $charID = $tweetRecord['char_id'];
    $time = $tweetRecord['post_time'];
    $icon = $tweetRecord['icon'];
    if(isset($icon)){
        $icon = 'uploads/'.$icon;
    }else{
        $icon = 'img/avatar_default_50x.png';
    }
    //自分以外のツイートの表示順番を反転
    $reverseClass = '';
    $uID = (int)$tweetRecord['uid'];
    $lID = (int)Session::getLoginUserID();
    if( $uID !== $lID){
        $reverseClass ='reverse';
    }
    //$user = UserTable::getUser($tweetRecord['id']);
?>

<div class="tweetBox <?php echo $reverseClass ?>">
    <div class="iconWrap"><img class="sq50px" src="<?php echo $icon ?>" alt="<?php echo $name ?>のアイコン"></div>
    <div class="tweetContent">
        <div class="tweetBody"><?php echo $text ?></div>
        <div class="tweetFooter">
            <span class="fll"><?php echo $name.' @'.$charID.' '.$time ?></span>
<!--            リプライ、リツイート、ふぁぼ等は未実装のため現在非表示-->
<!--            <span class="flr"">-->
<!--                <i class="fas fa-at">1234</i>-->
<!--                <i class="fas fa-retweet">5678</i>-->
<!--                <i class="fas fa-star">9012</i>-->
<!--                <i class="fas fa-ellipsis-h"></i>-->
<!--            </span>-->
<!--            -->
        </div>
    </div>
</div>