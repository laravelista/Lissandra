# Lissandra

API for Laracasts Feed built with Lumen.

> Lissandra fetches the Laracasts XML RSS feed and converts it to JSON format.
  By doing so I can fetch the feed with [Laranotti](https://github.com/laravelista/Laranotti).

## Caching

To prevent abuse this application (API) caches responses for 30 minutes.

**I suggest that the app that consumes this API has a waiting period of 1 hour.**

## API

**URL:** `lissandra.laravelista.com/`

#### `api/v1/feed/lessons`

Returns only the lessons from the current feed from Laracasts in JSON.

Attributes for each lesson from feed:

- title: **string**
- summary: **string**
- link: **string** (Link to that lesson or series)
- type: **string** (Returns lesson)
- date: **string** (Date when the lesson was updated in format DD.MM.YYYY (23.12.2014))

_Example output:_


```
[
    {
        "title": "Introducing Lumen",
        "summary": "Lumen is the perfect solution for building Laravel based micro-services and blazing fast APIs. In fact, it's one of the fastest micro-frameworks available. Let me show you how easy it is to get setup.",
        "link": "https:\/\/laracasts.com\/lessons\/introducing-lumen",
        "type": "lesson",
        "date": "14.04.2015"
    },
    {
        "title": "Selenium",
        "summary": "When you use the Selenium extension for Integrated, the API is identical (plus some browser-specific actions). This means, you can automate the browser with minimal effort.",
        "link": "https:\/\/laracasts.com\/series\/intuitive-integration-testing\/episodes\/5",
        "type": "lesson",
        "date": "13.04.2015"
    },
    ...
]
```


