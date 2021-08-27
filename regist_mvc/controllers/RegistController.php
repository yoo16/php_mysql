<?php

class RegistController
{
    //入力画面
    public function input()
    {
        //セッションから Memberクラスの読み込み
        $member = Session::load('member');
        if (empty($member)) {
            //$member がなかったら新規作成
            $member = new Member();
        }

        //エラー取得
        $errors = Session::load('errors');
        Session::clear('errors');

        //HTML を表示(View)
        include 'views/regist/input.php';
    }

    //確認画面
    public function confirm()
    {
        //Memberクラスの生成
        $member = new Member();
        //データ設定
        $member->bind($_POST);
        //データをチェック（バリデート）
        $member->validate();
        //Memberクラスをセッションを保存
        Session::save('member', $member);
        Session::save('errors', $member->errors);

        if ($member->validate()) {
            // Session::save('errors', $errors);
            //エラーの場合は input.php にリダイレクト
            header('Location: input.php');
        }

        include 'views/regist/confirm.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $member = Session::load('member');
            $member->insert($member->value);
            header('Location: result.php');
        }
    }

    //完了画面
    public function result()
    {
        //セッションから Memberクラスの読み込み
        $member = Session::load('member');
        if (empty($member)) {
            header('Location: input.php');
        } else {
            //セッション削除
            unset($_SESSION['member']);
            include 'views/regist/result.php';
        }
    }
}
