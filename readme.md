# Lissandra

~[](https://raw.githubusercontent.com/laravelista/Lissandra/master/lissandra.png)

API for Laracasts Feed built with Lumen.

> Lissandra fetches the Laracasts XML RSS feed and converts it to JSON format.
  By doing so I can fetch the feed with [Laranotti](https://github.com/laravelista/Laranotti).

If you are building something that uses JS and AJAX calls to fetch the Laracasts feed feel free to use `lissandra.laravelista.com` API for your needs to avoid CORS issues.

## Installation

If you want to install Lissandra on your own server follow the instructions bellow.    
*Also don't forget to create `.env` file in project root after installation. See `.env.example` for ideas.*

Lissandra utilizes Composer to manage its dependencies. So, before using Lissandra, you will need to make sure you have Composer installed on your machine.

You can install Lissandra by issuing the Composer `create-project` command in your terminal:

```
composer create-project laravelista/lissandra --prefer-dist
```

See [Lumen documentation](http://lumen.laravel.com/docs) for more details on the inner workings of Lissandra.

## Caching

To prevent abuse Lissandra caches the Laracasts feed for 30 minutes.

**I suggest that the app that consumes this API has a waiting period of 1 hour before contacting Lissandra again.**

## Learn the API

**URL:** `lissandra.laravelista.com/`

#### GET `api/v1/feed/lessons`

Returns only the lessons from the current feed from Laracasts in JSON.

Attributes for each lesson from feed:

- **`title`** lesson title.
- **`summary`** lesson description.
- **`link`** URL to that lesson on Laracasts.
- **`type`** always returns `lesson`.
- **`date`** date when the lesson was updated in format `d.m.Y` *(14.04.2015)*

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


