<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/JiraProjectSyncStatus */
enum JiraProjectSyncStatus: string
{
	case bidirectional = 'bidirectional';
	case jiraToLinear = 'jiraToLinear';
	case afterImport = 'afterImport';
	case notSyncing = 'notSyncing';
}
