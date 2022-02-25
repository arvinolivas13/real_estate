<?php

namespace App\Traits;

use League\Fractal\Resource\Collection;

trait GlobalFunction
{
    function series($prefix, $model)
    {
        $model = "App\\" . $model;
        if($model::count() === 0) {
           return $series = $prefix.str_pad($model::count() + 1, 7, '0', STR_PAD_LEFT);
        }
        else {
           return $series = $prefix.str_pad($model::count() + 1, 7, '0', STR_PAD_LEFT);
        }
    }
    function transform($collection, $transformer) {
        $new_collection = new Collection($collection, $transformer);
        $new_collection = $this->fractal->createData($new_collection);

        return $new_collection;
    }
}