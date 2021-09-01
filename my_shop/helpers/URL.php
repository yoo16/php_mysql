<?php
class URL
{
    //ラジオボタンの選択
    public static function route($path)
    {
        $url = BASE_URL . $path;
        return $url;
    }

    //ラジオボタンの選択
    public static function checked($value, $target)
    {
        if ($value == $target) {
            return 'checked';
        }
    }

    //プルダウンの選択
    public static function selected($value, $target)
    {
        if ($value == $target) {
            return 'selected';
        }
    }

    //性別のラベル表示
    public static function gender($key)
    {
        $genders = ['male' => '男性', 'female' => '女性'];
        if (isset($genders[$key])) {
            return $genders[$key];
        }
        return '';
    }
}
