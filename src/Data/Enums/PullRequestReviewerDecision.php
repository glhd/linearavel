<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/PullRequestReviewerDecision */
enum PullRequestReviewerDecision: string
{
	case pending = 'pending';
	case commented = 'commented';
	case approved = 'approved';
	case changesRequested = 'changesRequested';
	case dismissed = 'dismissed';
}
