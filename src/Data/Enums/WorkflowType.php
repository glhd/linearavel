<?php

namespace Glhd\Linearavel\Data\Enums;

enum WorkflowType : string
{
    case sla = 'sla';
    case custom = 'custom';
    case viewSubscription = 'viewSubscription';
}
