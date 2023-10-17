<?php

namespace HL\HiloxaTrigger\Listeners;

use HL\HiloxaTrigger\Services\HiloxaContactService;
use Illuminate\Contracts\Queue\ShouldQueue;

abstract class HiloxaListener implements ShouldQueue
{
    protected $event;
    protected string $triggerName;

    public function __construct(string $triggerName = "")
    {
        $this->triggerName = $triggerName;
    }

    public function handle($event)
    {
        $this->event = $event;
        $this->triggering();
    }

    protected function triggering(): void
    {
        if ($this->isTriggerable()) {
            $hiloxaContactService = new HiloxaContactService();
            $data = array_merge([
                'triggerAt' => date('Y-m-d H:i:s'),
                'triggerType' => $this->triggerName,
                'tableName' => $this->getTableName(),
            ], [
                'ip' => request()->ip(),
                'userAgent' => request()->userAgent()
            ], $this->getData());
            $hiloxaContactService->sendDataToHiloxa($data);
        }
    }

    protected function isTriggerable()
    {
        return config("hiloxa-trigger.trigger.{$this->triggerName}", false);
    }

    protected function getTableName(): string|null
    {
        return '';
    }

    protected function getData(): array
    {
        return [];
    }

}
