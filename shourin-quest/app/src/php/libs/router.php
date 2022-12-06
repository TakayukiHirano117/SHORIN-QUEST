<?php

namespace lib;

use Throwable;
use Error;


function route($rpath, $method)
{
    try {

        // throw new Error();

        if ($rpath === '') {
            $rpath = 'home';
        }

        $targetFile = SOURCE_BASE . "controllers/{$rpath}.php";

        if (!file_exists($targetFile)) {
            require_once SOURCE_BASE . "views/404.php";
            return;
        }

        // echo $targetFile;
        require_once $targetFile;

        $rpath = str_replace('/', '\\', $rpath);
        $fn = "\\controller\\{$rpath}\\{$method}";
        // echo $fn;

        $fn();
    } catch (Throwable $e) {
        Msg::push(Msg::DEBUG, $e->getMessage());
        Msg::push(Msg::ERROR, '何かがおかしいようです。');
        redirect('404');
    }
}
