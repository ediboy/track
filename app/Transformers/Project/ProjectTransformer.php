<?php

namespace App\Transformers\Project;

use App\Transformers\Transformer;

class ProjectTransformer extends Transformer
{
    /**
     * Transform project
     *
     * @param  Collection  $item
     * @return array
     */
    public function transform($item)
    {
        return [
            'id'                => $item->id,
            'title'             => $item->title,
            'description'       => $item->description
        ];
    }
}
