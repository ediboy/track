<?php

namespace App\Transformers\Profile;

use App\Transformers\Transformer;

class ProfileTransformer extends Transformer
{
    /**
     * Transform user field
     *
     * @param  Collection  $field
     * @return array
     */
    public function transform($field)
    {
        return [
            'id'        => $field['id'],
            'name'      => $field['name'],
            'value'     => $field['value'],
            'type'      => $field['type'],
            'order'     => $field['order'],
            'required'  => $field['required'],
            'group'     => $field['group'],
            'locked'    => $field['locked'],
            'content'   => $this->mapContent($field),
        ];
    }

    public function mapContent($item)
    {
        if ($item->users->isEmpty()) {
            return null;
        }

        if ($item->users[0]->pivot->value) {
            if ($item['type'] == 'image') {
                return Storage::url('public/profiles/' . $item->users[0]->pivot->value);
            }

            return $item->users[0]->pivot->value;
        }

        return null;
    }
}
