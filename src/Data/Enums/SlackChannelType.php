<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/SlackChannelType */
enum SlackChannelType: string
{
	case DirectMessage = 'DirectMessage';
	case MultiPersonDirectMessage = 'MultiPersonDirectMessage';
	case Private = 'Private';
	case Public = 'Public';
}
