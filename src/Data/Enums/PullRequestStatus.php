<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/PullRequestStatus */
enum PullRequestStatus: string
{
	case draft = 'draft';
	case open = 'open';
	case inReview = 'inReview';
	case approved = 'approved';
	case merged = 'merged';
	case closed = 'closed';
}
