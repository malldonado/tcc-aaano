<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mensagens extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
