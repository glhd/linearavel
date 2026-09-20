<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AgentActivitySignal */
enum AgentActivitySignal: string
{
	case stop = 'stop';
	case continue = 'continue';
	case auth = 'auth';
	case select = 'select';
}
