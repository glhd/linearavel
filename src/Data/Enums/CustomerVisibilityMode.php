<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/CustomerVisibilityMode */
enum CustomerVisibilityMode: string
{
	case LinearOnly = 'LinearOnly';
	case SlackMembers = 'SlackMembers';
	case SlackMembersAndGuests = 'SlackMembersAndGuests';
}
