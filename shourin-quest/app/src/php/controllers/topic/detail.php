<?php

namespace controller\topic\detail;

use Throwable;
use db\DataSource;
use db\AnswerQuery;
use lib\Msg;
use lib\Auth;
use db\TopicQuery;
use model\AnswerModel;
use model\TopicModel;
use model\UserModel;

function get()
{
    $topic = new TopicModel;
    $topic->id = get_param('topic_id', null, false);

    TopicQuery::incrementViewCount($topic);

    $fetchedTopic = TopicQuery::fetchById($topic);
    $answers = AnswerQuery::fetchByTopicId($topic);

    if (empty($fetchedTopic) || !$fetchedTopic->published) {
        Msg::push(Msg::ERROR, 'トピックが見つかりません');
        redirect('404');
    }

    \view\topic\detail\index($fetchedTopic, $answers);
}

function post()
{
    Auth::requireLogin();

    $answer = new AnswerModel;
    $answer->topic_id = get_param('topic_id', null);
    $answer->title = get_param('title', null);
    $answer->body = get_param('body', null);

    $user = UserModel::getSession();
    $answer->user_id = $user->id;

    try {
        $db = new DataSource;

        $db->begin();
        if (!empty($answer->body)) {
            $is_success = AnswerQuery::insert($answer);
        }
    } catch (Throwable $e) {
        Msg::push(Msg::DEBUG, $e->getMessage());
        $is_success = false;
    } finally {
        if ($is_success) {
            $db->commit();
            Msg::push(Msg::INFO, '回答の登録に成功しました。');
        } else {
            $db->rollback();
            Msg::push(Msg::ERROR, '回答の登録に失敗しました。');
        }
    }

    redirect('topic/detail?topic_id=' . $answer->topic_id);
}
