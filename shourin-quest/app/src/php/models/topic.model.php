<?php

namespace model;

use lib\Msg;

class TopicModel extends AbstractModel
{
    public int $id;
    public string $title;
    public string $body;
    public int $published;
    public int $views;
    public int $responses;
    public string $user_id;
    public string $nickname;
    public int $del_flg;
    public int $reception;
    // 受付状態

    protected static $SESSION_NAME = '_topic';

    public function isValidId()
    {
        return static::validateId($this->id);
    }

    public static function validateId($val)
    {
        $res = true;

        if (empty($val) || !is_numeric($val)) {

            Msg::push(Msg::ERROR, 'パラメータが不正です。');
            $res = false;
        }

        return $res;
    }

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

                Msg::push(Msg::ERROR, 'タイトルは30文字以内で入力してください。');
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

    public function isValidPublished()
    {
        return static::validatePublished($this->published);
    }

    public static function validatePublished($val)
    {
        $res = true;

        if (!isset($val)) {

            Msg::push(Msg::ERROR, '公開するか選択してください。');
            $res = false;
        } else {
            // 0、または1以外の時
            if (!($val == 0 || $val == 1)) {

                Msg::push(Msg::ERROR, '公開ステータスが不正です。');
                $res = false;
            }
        }

        return $res;
    }

    public function isValidReception()
    {
        return static::validateReception($this->reception);
    }

    public static function validateReception($val)
    {
        $res = true;

        if (!isset($val)) {

            Msg::push(Msg::ERROR, '受付状態を選択してください。');
            $res = false;
        } else {
            // 0、または1以外の時
            if (!($val == 0 || $val == 1)) {

                Msg::push(Msg::ERROR, '受付ステータスが不正です。');
                $res = false;
            }
        }

        return $res;
    }
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
