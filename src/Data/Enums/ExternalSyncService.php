<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/ExternalSyncService */
enum ExternalSyncService: string
{
	case jira = 'jira';
	case github = 'github';
	case slack = 'slack';
}
