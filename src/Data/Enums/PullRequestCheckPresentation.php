<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/PullRequestCheckPresentation */
enum PullRequestCheckPresentation: string
{
	case jobLogs = 'jobLogs';
	case runLogs = 'runLogs';
	case markdown = 'markdown';
	case externalOnly = 'externalOnly';
}
