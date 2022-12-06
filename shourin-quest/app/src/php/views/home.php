<?php

namespace view\home;

function index($topics)
{
    $topics = escape($topics);
    // print_r($topics);
    $topic = array_shift($topics);
    // print_r($topic);
    \partials\topic_header_item($topic, true);
?>
    <ul class="container">
        <?php
        foreach ($topics as $topic) {
            $url = get_url('topic/detail?topic_id=' . $topic->id);
            \partials\topic_list_item($topic, $url, false);
        }
        ?>
    </ul>
<?php
}
