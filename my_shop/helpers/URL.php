<?php
class URL
{
    //ラジオボタンの選択
    public static function route($path)
    {
        $url = BASE_URL . $path;
        return $url;
    }

}
