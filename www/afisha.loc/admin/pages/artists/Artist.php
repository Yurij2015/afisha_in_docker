<?php


class Artist
{
    public $name;
    public $description;
    public $linkphoto;

    function __construct($name, $description, $linkphoto)
    {
        $this->name = trim(htmlspecialchars($name));
        $this->description = trim(htmlspecialchars($description), " ");
        $this->linkphoto = $linkphoto;
    }

    public function name() {
        return "<h5>$this->name</h5>";
    }

    public function description() {
        return $this->description;
    }

}