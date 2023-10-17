<?php

namespace HL\HiloxaTrigger\Contracts;

use HL\HiloxaTrigger\DTO\HiloxaDTO;

interface HiloxaAble
{
    public function hiloxaDTO($model): HiloxaDTO;

}
