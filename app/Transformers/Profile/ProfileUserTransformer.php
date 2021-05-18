<?php

namespace App\Transformers\Profile;

use App\Transformers\Transformer;

class ProfileUserTransformer extends Transformer
{
    /**
     * Transform user field
     *
     * @param  Collection  $field
     * @return array
     */
    public function transform($item)
    {
        return [
            'name'  => $item->name,
            'value' => $item->pivot->value
        ];
    }
}
