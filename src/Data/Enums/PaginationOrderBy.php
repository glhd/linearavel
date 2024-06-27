<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/PaginationOrderBy */
enum PaginationOrderBy: string
{
	case createdAt = 'createdAt';
	case updatedAt = 'updatedAt';
}
