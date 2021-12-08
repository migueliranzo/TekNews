<?php

class Report
{
    // Properties
    public $id;
    public $title;
    public $description;
    public $author;
    public $imgpath;
    public $date;


    function __construct($id, $title,$description,$author,$imgpath,$date) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->author = $author;
        $this->imgpath = $imgpath;
        $this->date = $date;
        
      }

    // Methods
    function set_title($title)
    {
        $this->title = $title;
    }

    function set_id($id)
    {
        $this->id = $id;
    }

    function set_description($description)
    {
        $this->description = $description;
    }

    function set_author($author)
    {
        $this->author = $author;
    }

    function set_imgpath($imgpath)
    {
        $this->imgpath = $imgpath;
    }

    function set_date($date)
    {
        $this->date = $date;
    }

    function get_title()
    {
        return $this->title;
    }

    function get_id()
    {
        return $this->id;
    }

    function get_desciption()
    {
        return $this->description;
    }

    function get_author()
    {
        return $this->author;
    }

    function get_imgpath()
    {
        return $this->imgpath;
    }

    function get_date()
    {
        return $this->date;
    }
}
