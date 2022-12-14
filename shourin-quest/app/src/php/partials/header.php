<?php

namespace partials;

use lib\Auth;
use lib\Msg;

function header()
{
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SHOURIN-QUEST</title>
        <link href="//fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo BASE_CSS_PATH; ?>style.css">
    </head>

    <body>
        <div id="container">
            <header class="container my-2">
                <nav class="row align-items-center py-2">
                    <a href="<?php the_url('/'); ?>" class="col-md d-flex align-items-center mb-3 mb-md-0">
                        <img src="<?php echo BASE_IMAGE_PATH; ?>logo.png" alt="SHORIN-QUEST" class="mr-2" width="100">
                        <span class="h2 font-weight-bold mb-0">SHORIN-QUEST</span>
                    </a>
                    <div class="col-md-auto">
                        <?php if (Auth::isLogin()) : ?>
                            <?php // ログインしているとき 
                            ?>
                            <a href="<?php the_url('topic/create'); ?>" class="btn btn-primary mr-2">投稿</a>
                            <a href="<?php the_url('topic/archive'); ?>" class="mr-2">過去の投稿</a>
                            <a href="<?php the_url('logout'); ?>">ログアウト</a>
                        <?php else : ?>
                            <?php // ログインしていないとき 
                            ?>
                            <a href="<?php the_url('register'); ?>" class="btn btn-primary mr-2">登録</a>
                            <a href="<?php the_url('login'); ?>">ログイン</a>
                        <?php endif; ?>
                    </div>
                </nav>
            </header>
            <main class="container py-3">
            <?php


            Msg::flush();
        }

            ?>
