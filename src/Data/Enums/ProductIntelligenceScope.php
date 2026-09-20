<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/ProductIntelligenceScope */
enum ProductIntelligenceScope: string
{
	case workspace = 'workspace';
	case teamHierarchy = 'teamHierarchy';
	case team = 'team';
	case none = 'none';
}
