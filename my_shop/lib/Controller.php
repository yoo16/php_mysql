<?php
class Controller
{
    public function redirect($name)
    {
        $location = "Location: {$name}";
        header($location);
    }

}
