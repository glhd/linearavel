<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/TriageResponsibilityAction */
enum TriageResponsibilityAction: string
{
	case assign = 'assign';
	case notify = 'notify';
}
