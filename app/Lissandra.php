<?php  namespace App;

class Lissandra {

    protected $url = 'https://laracasts.com/feed';

    public function getXml()
    {
        return json_decode(json_encode(simplexml_load_file($this->url)));
    }

    public function getLessons()
    {
        $entries = $this->getXml()->entry;

        $entries = array_filter($entries, function($entry) {
            if($this->detectEntryType($entry) != 'lesson') return false;

            return true;
        });

        return array_map(function($entry) {
            return new Lesson($entry);
        }, $entries);
    }

    /**
     * @param $entry
     * @return string
     */
    public function detectEntryType($entry)
    {
        $string = $entry->link->{"@attributes"}->href;

        if (strpos($string, 'episodes') !== false || strpos($string, 'lessons') !== false)
        {
            return 'lesson';
        }

        return 'series';
    }

}