<?php

namespace HL\HiloxaTrigger\Trait\ListenerTraits;

use HL\HiloxaTrigger\DTO\CreateDTO;
use HL\HiloxaTrigger\DTO\HiloxaDTO;
use HL\HiloxaTrigger\Exceptions\InvalidHiloxaDataClass;

trait HasData
{
    /**
     * @throws \Throwable
     */
    protected function getData(): array
    {

        return match (true) {
            method_exists($this->event->model, 'hiloxaDTO') => $this->getDataFromModel(),
            default => $this->getDataFromConfig(),
        };
    }

    /**
     * @throws InvalidHiloxaDataClass
     */
    private function getDataFromModel(): array
    {
        $model = $this->event->model;
        $hiloxaData = $model->hiloxaDTO($model);

        if (!$hiloxaData instanceof HiloxaDTO) {
            throw  InvalidHiloxaDataClass::create(class_basename($hiloxaData));
        }
        return $hiloxaData->toArray();
    }

    /**
     * @throws \Throwable
     */
    private function getDataFromConfig(): array
    {
        $dataClassFromConfig = config('hiloxa-trigger.model_data', CreateDTO::class);
        $hiloxaData = app($dataClassFromConfig, ['model' => $this->event->model]);
        throw_if(!$hiloxaData instanceof CreateDTO, InvalidHiloxaDataClass::create(class_basename($hiloxaData)));
        return $hiloxaData->toArray();
    }
}
