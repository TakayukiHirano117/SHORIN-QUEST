<?php

namespace partials;

function topic_list_item($topic, $title_url, $with_status)
{
    $published_label = $topic->published ? '公開' : '非公開';
    $published_cls = $topic->published ? 'badge-primary' : 'badge-danger';
?>
    <li class="row bg-white shadow-sm mb-3 rounded p-3 topic">
        <div class="col-md d-flex align-items-center">
            <h2 class="mb-2 mb-md-0">
                <?php if ($with_status) : ?>
                    <span class="badge mr-2 align-bottom <?php echo $published_cls; ?>"><?php echo $published_label; ?></span>
                <?php endif; ?>
                <a class="text-body" href="<?php echo $title_url; ?>"><?php echo $topic->title ?></a>
            </h2>
        </div>
        <div class="col-auto mx-auto">
            <div class="text-center row">
                <div class="view col-auto min-w-100">
                    <div class="h1 mb-0"><?php echo $topic->views ?></div>
                    <div class="mb-0">Views</div>
                </div>
                <div class="responses-red col-auto min-w-100">
                    <div class="h1 mb-0"><?php echo $topic->responses ?></div>
                    <div class="mb-0">回答数</div>
                </div>
            </div>
        </div>
    </li>
<?php
}
