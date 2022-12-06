<?php

namespace partials;

use lib\Auth;

function topic_header_item($topic, $from_top_page)
{

?>
    <div class="row">
        <!-- <div class="col"> -->
        <!-- </div> -->
        <div class="col my-3">
            <?php topic_main($topic, $from_top_page); ?>
            <?php answer_form($topic); ?>
        </div>
    </div>
<?php
}

function topic_main($topic, $from_top_page)
{
    $reception_label = $topic->reception ? '受付中' : '解決済み';
    $reception_cls = $topic->reception ? 'badge-success' : 'badge-info';
?>
    <div>
        <?php if ($from_top_page) : ?>
            <span class="badge mr-2 mb-2 <?php echo $reception_cls ?>"><?php echo $reception_label ?></span>
            <h1 class="sr-only"><?php echo 'SHORIN-QUEST' ?></h1>
            <h2 class="h1">
                <a class="text-body" href="<?php the_url('topic/detail?topic_id=' . $topic->id); ?>">
                    <?php echo $topic->title ?>
                </a>
            </h2>
        <?php else : ?>
            <span class="badge mr-2 mb-2 <?php echo $reception_cls ?>"><?php echo $reception_label ?></span>
            <h1><?php echo $topic->title ?></h1>
        <?php endif; ?>
        <span class="mr-1 h5">Posted by <?php echo $topic->nickname ?></span>
        <span class="mr-1 h5">&bull;</span>
        <span class="mr-1"><?php echo $topic->views ?>views</span>
        <span class="mr-1 h5">&bull;</span>
        <span class="mr-1"><?php echo $topic->responses ?>answers</span>
    </div>
    <div class="mt-3 h6">
        <?php echo $topic->body ?>
    </div>
<?php
}

function answer_form($topic)
{
?>
    <?php if (Auth::isLogin()) : ?>
        <form action="<?php the_url('topic/detail'); ?>" class="mt-3" method="POST">
            <span class="h4 text-primary">&#x21E8;質問に回答する</span>
            <input type="hidden" name="topic_id" value="<?php echo $topic->id; ?>">
            <div class="form-group">
                <input type="text" name="title" id="title" placeholder="タイトルを書こう" class="mt-2 border-light">
                <textarea class="w-100 mt-2 border-light" name="body" id="body" rows="5" placeholder="回答の本文を書こう"></textarea>
            </div>
            <div class="container">
                <div class="form-group row">
                    <input type="submit" value="送信" class="col btn btn-success shadow-sm">
                </div>
            </div>
        </form>
        <div class="mb-3">回答<?php echo $topic->responses; ?>件</div>
        <!-- 回答をループで表示する処理 -->
    <?php else : ?>
        <div class="text-center mt-5">
            <div class="mb-2">ログインして質問に回答しよう！</div>
            <a href="<?php the_url('login'); ?>" class="btn btn-lg btn-success">ログインはこちら！</a>
        </div>
    <?php endif; ?>
<?php
}
