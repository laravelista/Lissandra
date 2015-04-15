<?php  namespace App;

class Lesson {

    /**
     * Introducing Lumen
     *
     * @var
     */
    public $title;

    /**
     * Lumen is the perfect solution for building Laravel based micro-services and
     * blazing fast APIs. In fact, it's one of the fastest micro-frameworks available.
     * Let me show you how easy it is to get setup.
     *
     * @var
     */
    public $summary;

    /**
     * https://laracasts.com/lessons/introducing-lumen
     *
     * @var
     */
    public $link;

    /**
     * lesson
     *
     * @var
     */
    public $type;

    /**
     * 14.4.2015
     *
     * @var
     */
    public $date;

    /**
     * @param $entry
     */
    function __construct($entry)
    {
        $this->title = $entry->title;
        $this->summary = $entry->summary;
        $this->link = $entry->link->{"@attributes"}->href;
        $this->type = 'lesson';
        $this->date = $this->formatDate($entry->updated);
    }

    /**
     * @param $string
     * @return bool|string
     */
    private function formatDate($string)
    {
        return date('d.m.Y', strtotime($string));
    }
}