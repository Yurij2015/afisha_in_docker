<?php
/**
 * Project: afisha
 * Filename: News.php
 * Date: 12/13/2019
 * Time: 10:02 PM
 */

class News
{
    public $name;
    public $description;

    function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function description()
    {
        return $this->description;
    }

    public function name()
    {
        return $this->name;
    }

}