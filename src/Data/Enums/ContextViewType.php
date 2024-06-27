<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/ContextViewType */
enum ContextViewType: string
{
	case activeIssues = 'activeIssues';
	case activeCycle = 'activeCycle';
	case upcomingCycle = 'upcomingCycle';
	case backlog = 'backlog';
	case triage = 'triage';
}
