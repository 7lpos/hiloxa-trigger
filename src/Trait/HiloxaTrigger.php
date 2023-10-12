<?php

namespace HL\HiloxaTrigger\Trait;

use HL\HiloxaTrigger\DTO\CreateDTO;
use HL\HiloxaTrigger\DTO\HiloxaDTO;
use HL\HiloxaTrigger\Events\CreatedModel;
use HL\HiloxaTrigger\Events\UpdatedModel;
use Illuminate\Http\Request;

trait HiloxaTrigger
{

    public function initializeHiloxaTrigger(): void
    {
        $this->dispatchesEvents = [
            'created' => CreatedModel::class,
            'updated' => UpdatedModel::class,
        ];
    }

    public function hiloxaDTO($model): HiloxaDTO
    {
        return new CreateDTO($model);
    }

}
