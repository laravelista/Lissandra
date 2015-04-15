<?php namespace App;

use Cache;

class Lissandra implements FeedInterface {

    /**
     *
     */
    CONST FEED_CACHE_DURATION = 30; //minutes

    /**
     * @var string
     */
    protected $url = 'https://laracasts.com/feed';

    /**
     * Gets XML RSS feed from Laracasts.
     *
     * @return mixed
     */
    private function getXml()
    {
        return json_decode(json_encode(simplexml_load_file($this->url)));
    }

    /**
     * Gets only lessons from feed and wraps
     * them as Lesson class.
     *
     * @return array
     */
    public function getLessons()
    {
        $entries = $this->getEntries();

        $entries = $this->filterLessons($entries);

        return $this->wrapLessons($entries);
    }

    /**
     * Detects if an entry is a lesson or series.
     *
     * @param $entry
     * @return string
     */
    private function detectEntryType($entry)
    {
        $string = $entry->link->{"@attributes"}->href;

        if (strpos($string, 'episodes') !== false || strpos($string, 'lessons') !== false)
        {
            return 'lesson';
        }

        return 'series';
    }

    /**
     * Gets feed from Laracasts.
     *
     * Uses cache to reduce the number of
     * calls to Laracasts feed.
     *
     * @return mixed
     */
    private function getEntries()
    {
        if (Cache::has('feed'))
        {
            return Cache::get('feed');
        }

        $entries = $this->getXml()->entry;

        Cache::put('feed', $entries, $this::FEED_CACHE_DURATION);

        return $entries;
    }

    /**
     * Returns new array that contains
     * entries that have type lesson.
     *
     * @param $entries
     * @return array
     */
    private function filterLessons($entries)
    {
        $entries = array_filter($entries, function ($entry)
        {
            if ($this->detectEntryType($entry) != 'lesson') return false;

            return true;
        });

        return $entries;
    }

    /**
     * Wraps entries to class Lesson.
     *
     * @param $entries
     * @return array
     */
    private function wrapLessons($entries)
    {
        return array_map(function ($entry)
        {
            return new Lesson($entry);
        }, $entries);
    }

}