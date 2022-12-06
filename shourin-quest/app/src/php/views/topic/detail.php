<?php

namespace view\topic\detail;

function index($topic, $answers)
{
    $topic = escape($topic);
    $answers = escape($answers);

    \partials\topic_header_item($topic, false);
?>
    <ul class="list-unstyled">
        <?php foreach ($answers as $answer) : ?>
            <li class="bg-white shadow-sm mb-3 rounded p-3">
                <h2 class="h4 mb-2">
                    <span class="text-body" href=""><?php echo $answer->title; ?></span><br>
                    <span class="text-body h6" href=""><?php echo $answer->body; ?></span>
                </h2>
                <span>Answered by <?php echo $answer->nickname; ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
<?php
}
