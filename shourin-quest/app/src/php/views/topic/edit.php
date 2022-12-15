<?php

namespace view\topic\edit;

function index($topic, $is_edit)
{
    $header_title = $is_edit ? 'トピック編集' : 'トピック作成';
?>
    <h1 class=h2 mb-3""><?php echo $header_title ?></h1>

    <div class="bg-white p-4 shadow-sm mx-auto rounded">
        <form class="validate-form" action="<?php echo CURRENT_URI; ?>" method="POST" novalidate autocomplete="off">
            <input type="hidden" name="topic_id" value="<?php echo $topic->id; ?>">
            <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" id="title" name="title" value="<?php echo $topic->title; ?>" class="form-control validate-target" required maxlength="50" autofocus>
                <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
                <label for="">本文</label>
                <textarea rows="10" id="body" name="body" value="" class="form-control validate-target" required maxlength="1000"><?php echo $topic->body; ?></textarea>
                <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
                <label for="published">公開状態</label>
                <select name="published" id="published" class="form-control">
                    <option value="1" <?php echo $topic->published ? 'selected' : ''; ?>>公開</option>
                    <option value="0" <?php echo $topic->published ? '' : 'selected'; ?>>非公開</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">受付状態</label>
                <select name="" id="" class="form-control">
                    <option value="1" <?php echo $topic->reception ? 'selected' : ''; ?>>受付中</option>
                    <option value="0" <?php echo $topic->reception ? '' : 'selected'; ?>>解決済み</option>
                </select>
            </div>
            <div class="d-flex align-items-center">
                <div>
                    <input type="submit" value="送信" class="btn btn-primary shadow-sm mr-3">
                </div>
                <div>
                    <a href="<?php the_url('topic/archive') ?>">戻る</a>
                </div>
            </div>
        </form>
    </div>

<?php
}
