<?php
//モデルファイルの読み込み
require_once 'models/Member.php';
require_once 'helpers/Form.php';
require_once 'helpers/Session.php';
//コントローラーを読み込み
require_once 'controllers/RegistController.php';

//コントローラを発生
$controller = new RegistController();
//input() メソッドを実行
$controller->input();
