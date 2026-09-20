<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/ReleasePipelineType */
enum ReleasePipelineType: string
{
	case continuous = 'continuous';
	case scheduled = 'scheduled';
}
