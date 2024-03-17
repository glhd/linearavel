<?php

namespace Glhd\Linearavel\Data\Enums;

enum ContextViewType: string
{
	case activeIssues = 'activeIssues';
	case activeCycle = 'activeCycle';
	case upcomingCycle = 'upcomingCycle';
	case backlog = 'backlog';
	case triage = 'triage';
}
