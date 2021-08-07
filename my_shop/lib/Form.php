<?php
class Form
{
    public static function selected($value, $target)
    {
        return ($value == $target) ? 'selected' : '';
    }

    public static function checked($value, $target)
    {
        return ($value == $target) ? 'checked' : '';
    }

    public static function labelGender($value)
    {
        $genders = ['male' => '男性', 'female' => '女性'];
        return (isset($genders[$value])) ? $genders[$value] : '';
    }

    public static function paginate($count, $limit, $current_page, $max_page)
    {
        $total_page = ceil($count / $limit);
        $start = ($current_page < 5) ? 1 : $current_page;
        $end = ($start - 1) + $max_page;
        if ($start + $max_page >= $total_page) {
            if ($end > $total_page) {
                $end = $total_page;
                $start = $total_page - $max_page + 1;
            } else if ($start > 1) {
                $start -= 1;
                $end -= 1;
            }
        }
        $pages = range($start, $end);
        return $pages;
    }
}
