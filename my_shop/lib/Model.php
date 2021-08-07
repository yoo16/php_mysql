<?php
class Model
{
    function __construct()
    {
    }

    public function check($posts)
    {
        if (!$posts) return;
        foreach ($posts as $column => $post) {
            $posts[$column] = htmlspecialchars($post, ENT_QUOTES, 'UTF-8');
        }
        return $posts;
    }


    public function bind($posts)
    {
        $this->check($posts);
        if (!$posts) return;
        $columns = array_keys($this->value);
        foreach ($posts as $column => $post) {
            if (in_array($column, $columns)) {
                $this->value[$column] = $posts[$column];
            }
        }
    }

}
