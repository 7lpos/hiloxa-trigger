<?php

namespace HL\HiloxaTrigger\DTO;

use HL\HiloxaTrigger\Contracts\HiloxaAble;
use Illuminate\Database\Eloquent\Model;

abstract class HiloxaDTO
{
    public function __construct(protected HiloxaAble $model)
    {

    }

    abstract public function toArray();
}
