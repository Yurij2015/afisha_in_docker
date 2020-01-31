<?php
/**
 * Project: afisha
 * Filename: Repertoire.php
 * Date: 12/13/2019
 * Time: 10:14 PM
 */

class Repertoire
{

    public $name;
    public $author;
    public $description;
    public $linkimg;
    public $agelimitation;

    function __construct($name, $author, $description, $linkimg, $agelimitation)
    {
        $this->name = trim(htmlspecialchars($name));
        $this->author = trim(htmlspecialchars($author));
        $this->description = trim(htmlspecialchars($description));
        $this->linkimg = trim(htmlspecialchars($linkimg));
        $this->agelimitation = trim(htmlspecialchars($agelimitation));
    }

    public function description()
    {
        return $this->description;
    }

    public function author()
    {
        return $this->author;
    }

    public function name()
    {
        return $this->name;
    }

    public function linkimg()
    {
        return $this->linkimg;
    }

    public function agelimitation()
    {
        return $this->agelimitation;
    }
}