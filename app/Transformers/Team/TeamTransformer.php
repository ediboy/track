<?php

namespace App\Transformers\Team;

use App\Transformers\Transformer;

class TeamTransformer extends Transformer
{
    /**
     * Transform team list
     *
     * @param  Collection  $item
     * @return array
     */
    public function transform($item)
    {
        return [
            'id'                => $item->id,
            'title'             => $item->title,
            'description'       => $item->description,
            'users_count'       => $item->users_count
        ];
    }
}
