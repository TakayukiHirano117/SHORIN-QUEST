<?php

namespace model;

use lib\Msg;

class AnswerModel extends AbstractModel
{
    public int $id;
    public int $topic_id;
    public string $title;
    public string $body;
    public string $user_id;
    public string $nickname;
    public int $del_flg;

    public function isValidTitle()
    {
        return static::validateTitle($this->title);
    }

    public static function validateTitle($val)
    {
        $res = true;

        if (empty($val)) {

            Msg::push(Msg::ERROR, 'タイトルを入力してください。');
            $res = false;
        } else {

            if (mb_strlen($val) > 30) {

                Msg::push(Msg::ERROR, 'タイトルは30文字以下で入力してください。');
                $res = false;
            }
        }

        return $res;
    }

    public function isValidBody()
    {
        return static::validateBody($this->body);
    }

    public static function validateBody($val)
    {
        $res = true;

        if (empty($val)) {

            Msg::push(Msg::ERROR, '本文を入力してください。');
            $res = false;
        } else {

            if (mb_strlen($val) > 1000) {

                Msg::push(Msg::ERROR, '本文は1000文字以内で入力してください。');
                $res = false;
            }
        }

        return $res;
    }

    public function isValidTopicId()
    {
        return TopicModel::validateId($this->topic_id);
    }
}
