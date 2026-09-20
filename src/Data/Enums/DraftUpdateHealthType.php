<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/DraftUpdateHealthType */
enum DraftUpdateHealthType: string
{
	case onTrack = 'onTrack';
	case atRisk = 'atRisk';
	case offTrack = 'offTrack';
}
