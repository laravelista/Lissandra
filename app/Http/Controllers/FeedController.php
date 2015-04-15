<?php  namespace App\Http\Controllers;

use App\Lissandra;
use App\Transformers\LessonTransformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Manager;

class FeedController extends Controller {

    protected $lissandra;

    protected $fractal;

    public function __construct(Lissandra $lissandra, Manager $fractal)
    {
        $this->lissandra = $lissandra;
        $this->fractal = $fractal;
    }

    /**
     * Returns only the lessons from the
     * current feed from Laracasts in JSON.
     */
    public function lessons()
    {
        $lessons = $this->lissandra->getLessons();

        $resource = new Collection($lessons, new LessonTransformer($lessons));

        $data = $this->fractal->createData($resource)->toArray()['data'];

        return $this->respondWithCORS($data);
    }

}