<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/PaginationSortOrder */
enum PaginationSortOrder: string
{
	case Ascending = 'Ascending';
	case Descending = 'Descending';
}
