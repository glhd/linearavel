<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/ImportUsersOption */
enum ImportUsersOption: string
{
	case matchAndInvite = 'matchAndInvite';
	case matchOnly = 'matchOnly';
	case skip = 'skip';
}
