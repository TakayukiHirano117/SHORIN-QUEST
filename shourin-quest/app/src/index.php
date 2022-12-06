<?php
require_once "config.php";

// echo $_SERVER['REQUEST_URI'];

// Library
require_once SOURCE_BASE . 'libs/helper.php';
require_once SOURCE_BASE . 'libs/auth.php';
require_once SOURCE_BASE . 'libs/router.php';

// Model
require_once SOURCE_BASE . 'models/abstract.model.php';
require_once SOURCE_BASE . 'models/user.model.php';
require_once SOURCE_BASE . 'models/topic.model.php';
require_once SOURCE_BASE . 'models/answer.model.php';

// Message
require_once SOURCE_BASE . 'libs/message.php';

// DB
require_once SOURCE_BASE . 'db/datasource.php';
require_once SOURCE_BASE . 'db/user.query.php';
require_once SOURCE_BASE . 'db/topic.query.php';
require_once SOURCE_BASE . 'db/answer.query.php';

// Partials
require_once SOURCE_BASE . 'partials/topic-list-item.php';
require_once SOURCE_BASE . 'partials/topic-header-item.php';
require_once SOURCE_BASE . 'partials/header.php';
require_once SOURCE_BASE . 'partials/footer.php';

// View
require_once SOURCE_BASE . 'views/home.php';
require_once SOURCE_BASE . 'views/login.php';
require_once SOURCE_BASE . 'views/register.php';
require_once SOURCE_BASE . 'views/topic/archive.php';
require_once SOURCE_BASE . 'views/topic/detail.php';
require_once SOURCE_BASE . 'views/topic/edit.php';

use function lib\route;

session_start();

try {
    \partials\header();

    require_once SOURCE_BASE . 'partials/header.php';

    $url = parse_url(CURRENT_URI);

    $rpath = str_replace(BASE_CONTEXT_PATH, '', $url['path']);
    // echo $rpath;

    $method = strtolower($_SERVER['REQUEST_METHOD']);
    // echo strtolower($method);

    route($rpath, $method);

    \partials\footer();

    require_once SOURCE_BASE . 'partials/footer.php';
} catch (Throwable $e) {
    die('<h1>何かがおかしいようです。</h1>');
}



// if ($_SERVER['REQUEST_URI'] === '/shourin-quest/src/login') {
//     require_once SOURCE_BASE . 'controllers/login.php';
// } elseif ($_SERVER['REQUEST_URI'] === '/shourin-quest/src/register') {
//     require_once SOURCE_BASE . 'controllers/register.php';
// } elseif ($_SERVER['REQUEST_URI'] === '/shourin-quest/src/') {
//     require_once SOURCE_BASE . 'controllers/home.php';
// }
