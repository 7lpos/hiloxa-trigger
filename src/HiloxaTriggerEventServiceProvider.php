<?php

namespace HL\HiloxaTrigger;

use HL\HiloxaTrigger\Events\CreatedModel;
use HL\HiloxaTrigger\Events\UpdatedModel;
use HL\HiloxaTrigger\Listeners\CreatedHiloxaListener;
use HL\HiloxaTrigger\Listeners\UpdatedHiloxaListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as BaseEventServiceProvider;

class HiloxaTriggerEventServiceProvider extends BaseEventServiceProvider
{
    protected $listen = [
        CreatedModel::class => [
            CreatedHiloxaListener::class
        ],
        UpdatedModel::class => [
            UpdatedHiloxaListener::class
        ],
    ];

}
