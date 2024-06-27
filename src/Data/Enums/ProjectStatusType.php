<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/ProjectStatusType */
enum ProjectStatusType: string
{
	case backlog = 'backlog';
	case planned = 'planned';
	case started = 'started';
	case paused = 'paused';
	case completed = 'completed';
	case canceled = 'canceled';
}
