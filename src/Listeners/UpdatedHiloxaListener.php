<?php

namespace HL\HiloxaTrigger\Listeners;

use HL\HiloxaTrigger\Trait\ListenerTraits\HasData;
use HL\HiloxaTrigger\Trait\ListenerTraits\HasTableName;

class UpdatedHiloxaListener extends HiloxaListener
{
    use HasTableName, HasData;

    public function __construct()
    {
        parent::__construct("update");
    }
}
