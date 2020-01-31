<?php
/**
 * Project: afisha
 * Filename: Comments.php
 * Date: 12/13/2019
 * Time: 9:03 PM
 */

class Comments
{
    public $authorname;
    public $content;

    function __construct($authorname, $content)
    {
        $this->authorname = trim(htmlspecialchars($authorname));
        $this->content = trim(htmlspecialchars($content));
    }

    public function authorname()
    {
        return $this->authorname;
    }

    public function content()
    {
        return $this->content;
    }

}