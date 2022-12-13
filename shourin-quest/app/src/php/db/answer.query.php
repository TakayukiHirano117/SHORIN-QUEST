<?php

namespace db;

use db\DataSource;
use model\AnswerModel;

class AnswerQuery
{

    public static function fetchByTopicId($topic)
    {
        if (!$topic->isValidId()) {
            return false;
        }

        $db = new DataSource;
        $sql = '
        select
            a.*, u.nickname
        from answers a
        inner join users u 
            on a.user_id = u.id
        where a.topic_id = :id
            and a.body != ""
            and a.del_flg != 1
            and u.del_flg != 1
        order by a.id desc
        ';



        $result = $db->select($sql, [
            ':id' => $topic->id
        ], DataSource::CLS, AnswerModel::class);

        return $result;
    }

    public static function insert($answer)
    {
        //値のチェック
        if (!($answer->isValidTopicId()
            * $answer->isValidTitle()
            * $answer->isValidBody())) {
            return false;
        }

        $db = new DataSource;
        $sql = 'insert into answers
                    (topic_id, title, body, user_id) 
                values
                    (:topic_id, :title, :body, :user_id)
                    ';

        return $db->execute($sql, [
            ':topic_id' => $answer->topic_id,
            ':title' => $answer->title,
            ':body' => $answer->body,
            ':user_id' => $answer->user_id,
        ]);
    }

}
