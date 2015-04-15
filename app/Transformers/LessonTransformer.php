<?php namespace App\Transformers;

use App\Lesson;
use League\Fractal\TransformerAbstract;

class LessonTransformer extends TransformerAbstract {

    public function transform(Lesson $lesson)
    {
        return [
            'title'   => $lesson->title,
            'summary' => $lesson->summary,
            'link'    => $lesson->link,
            'type'    => $lesson->type,
            'date'    => $lesson->date,
        ];
    }
}

