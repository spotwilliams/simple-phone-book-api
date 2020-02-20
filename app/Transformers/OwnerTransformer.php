<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use PhoneBook\Models\Owner;

class OwnerTransformer extends TransformerAbstract
{
    public function transform(Owner $owner)
    {
        return [
            'token' => $owner->getAccessToken(),
        ];
    }
}
