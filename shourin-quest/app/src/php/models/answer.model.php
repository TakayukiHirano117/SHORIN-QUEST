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

    // public function isValidId()
    // {
    //     return static::validateId($this->id);
    // }

    // public static function validateId($val)
    // {
    //     $res = true;
    //     if (empty($val)) {
    //         Msg::push(Msg::ERROR, 'ユーザーIDを入力してください。');
    //         $res = false;
    //     } else {
    //         if (strlen($val) > 15) {
    //             Msg::push(Msg::ERROR, 'ユーザーIDは15桁以内で入力してください。');
    //             $res = false;
    //         }

    //         if (!is_alnum($val)) {
    //             Msg::push(Msg::ERROR, 'ユーザーIDは半角英数字で入力してください。');
    //             $res = false;
    //         }
    //     }

    //     return $res;
    // }

    // public static function validatePwd($val)
    // {
    //     $res = true;

    //     if (empty($val)) {

    //         Msg::push(Msg::ERROR, 'パスワードを入力してください。');
    //         $res = false;
    //     } else {

    //         if (strlen($val) < 4) {

    //             Msg::push(Msg::ERROR, 'パスワードは４桁以上で入力してください。');
    //             $res = false;
    //         }

    //         if (!is_alnum($val)) {

    //             Msg::push(Msg::ERROR, 'パスワードは半角英数字で入力してください。');
    //             $res = false;
    //         }
    //     }

    //     return $res;
    // }

    // public function isValidPwd()
    // {
    //     return static::validatePwd($this->pwd);
    // }

    // public static function validateNickname($val)
    // {

    //     $res = true;

    //     if (empty($val)) {

    //         Msg::push(Msg::ERROR, 'ニックネームを入力してください。');
    //         $res = false;
    //     } else {

    //         if (mb_strlen($val) > 20) {

    //             Msg::push(Msg::ERROR, 'ニックネームは20桁以下で入力してください。');
    //             $res = false;
    //         }
    //     }

    //     return $res;
    // }

    // public function isValidNickname()
    // {
    //     return static::validateNickname($this->nickname);
    // }
}
