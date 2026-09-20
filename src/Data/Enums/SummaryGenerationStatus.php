<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/SummaryGenerationStatus */
enum SummaryGenerationStatus: string
{
	case pending = 'pending';
	case completed = 'completed';
	case failed = 'failed';
}
