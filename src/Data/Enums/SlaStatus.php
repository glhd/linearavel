<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/SlaStatus */
enum SlaStatus: string
{
	case Breached = 'Breached';
	case HighRisk = 'HighRisk';
	case MediumRisk = 'MediumRisk';
	case LowRisk = 'LowRisk';
	case Completed = 'Completed';
	case Failed = 'Failed';
	case Paused = 'Paused';
}
