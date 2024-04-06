<?php
require_once "env.php";

// アプリケーションのルートディレクトリパス
const BASE_DIR = __DIR__;
// app/ ディレクトリパス
const APP_DIR = __DIR__ . "/app/";
// lib/ ディレクトリパス
const LIB_DIR = __DIR__ . "/lib/";

// ライブラリ読み込み
require_once LIB_DIR . 'Model.php';