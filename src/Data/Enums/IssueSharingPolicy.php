<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/IssueSharingPolicy */
enum IssueSharingPolicy: string
{
	case disabled = 'disabled';
	case adminsOnly = 'adminsOnly';
	case allMembers = 'allMembers';
}
