<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/PostType */
enum PostType: string
{
	case summary = 'summary';
	case update = 'update';
}
