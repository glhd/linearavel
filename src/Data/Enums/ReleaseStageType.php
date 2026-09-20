<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/ReleaseStageType */
enum ReleaseStageType: string
{
	case planned = 'planned';
	case started = 'started';
	case completed = 'completed';
	case canceled = 'canceled';
}
