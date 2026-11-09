<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/JiraProjectImportStatus */
enum JiraProjectImportStatus: string
{
	case none = 'none';
	case queued = 'queued';
	case importing = 'importing';
	case imported = 'imported';
	case failed = 'failed';
	case expired = 'expired';
	case deleting = 'deleting';
}
