<?php

class Config
{
    public function file_root()
    {
        $root = $_SERVER['DOCUMENT_ROOT'].'/emp/wordworld/';
        return $root;
    }
}

?>