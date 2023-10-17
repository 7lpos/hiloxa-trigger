<?php

namespace HL\HiloxaTrigger\Trait;

use HL\HiloxaTrigger\DTO\CreateDTO;
use HL\HiloxaTrigger\DTO\HiloxaDTO;
use HL\HiloxaTrigger\Events\CreatedModel;
use HL\HiloxaTrigger\Events\UpdatedModel;
use HL\HiloxaTrigger\Observers\HiloxaObserver;
use Illuminate\Http\Request;

trait HiloxaTrigger
{

    public static function bootHiloxaTrigger()
    {
        static::observe(new HiloxaObserver());
    }

    public function hiloxaDTO($model): HiloxaDTO
    {
        return new CreateDTO($model);
    }

}
