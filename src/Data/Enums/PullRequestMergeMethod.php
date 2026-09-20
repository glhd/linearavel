<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/PullRequestMergeMethod */
enum PullRequestMergeMethod: string
{
	case MERGE = 'MERGE';
	case REBASE = 'REBASE';
	case SQUASH = 'SQUASH';
}
