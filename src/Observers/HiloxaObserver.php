<?php

namespace HL\HiloxaTrigger\Observers;

use HL\HiloxaTrigger\Contracts\HiloxaAble;
use HL\HiloxaTrigger\Events\CreatedModel;
use HL\HiloxaTrigger\Events\UpdatedModel;
use Illuminate\Support\Facades\Event;

class HiloxaObserver
{
    public function created(HiloxaAble $model)
    {
        Event::dispatch(new CreatedModel($model));
    }

    public function updated(HiloxaAble $model)
    {
        Event::dispatch(new UpdatedModel($model));
    }
}
