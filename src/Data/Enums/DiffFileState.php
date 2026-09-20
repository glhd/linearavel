<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/DiffFileState */
enum DiffFileState: string
{
	case added = 'added';
	case modified = 'modified';
	case deleted = 'deleted';
	case renamed = 'renamed';
	case copied = 'copied';
	case type_changed = 'type_changed';
	case unmerged = 'unmerged';
	case unknown = 'unknown';
}
