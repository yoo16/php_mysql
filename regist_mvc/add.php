<?php
//モデルファイルの読み込み
require_once 'models/Member.php';
require_once 'helpers/Form.php';
require_once 'helpers/Session.php';
require_once 'controllers/RegistController.php';

require_once 'helpers/DB.php';
require_once 'setting.php';

$controller = new RegistController();
$controller->add();
