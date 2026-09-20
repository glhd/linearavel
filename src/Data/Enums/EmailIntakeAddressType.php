<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/EmailIntakeAddressType */
enum EmailIntakeAddressType: string
{
	case team = 'team';
	case template = 'template';
	case asks = 'asks';
	case asksWeb = 'asksWeb';
}
