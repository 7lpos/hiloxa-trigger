<?php

namespace HL\HiloxaTrigger\Trait\ListenerTraits;

trait HasTableName
{
    protected function getTableName(): string|null
    {
        return $this->event->model->getTable();
    }
}
