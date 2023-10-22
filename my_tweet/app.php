<?php
const BASE_DIR = __DIR__;
require_once(BASE_DIR . "/env.php");
require_once(BASE_DIR . "/app/models/User.php");
require_once(BASE_DIR . "/app/models/Tweet.php");

session_start();
session_regenerate_id(true);
