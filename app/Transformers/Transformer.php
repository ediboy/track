<?php

namespace App\Transformers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

abstract class Transformer
{
    /**
     * Transform a collection
     *
     * @param  array $items
     * @return Collection
     */
    public function transformCollection($items)
    {
        return collect($items)->map(function ($item) {
            return $this->transform($item);
        });
    }

    /**
     * Transform a single item
     *
     * @param  array $item
     * @return array
     */
    abstract public function transform($item);
}
