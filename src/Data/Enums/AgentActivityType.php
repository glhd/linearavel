<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AgentActivityType */
enum AgentActivityType: string
{
	case thought = 'thought';
	case action = 'action';
	case response = 'response';
	case elicitation = 'elicitation';
	case error = 'error';
	case prompt = 'prompt';
}
