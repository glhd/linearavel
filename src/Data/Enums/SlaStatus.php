<?php

namespace Glhd\Linearavel\Data\Enums;

enum SlaStatus : string
{
    case Breached = 'Breached';
    case HighRisk = 'HighRisk';
    case MediumRisk = 'MediumRisk';
    case LowRisk = 'LowRisk';
    case Completed = 'Completed';
    case Failed = 'Failed';
    case Paused = 'Paused';
}
