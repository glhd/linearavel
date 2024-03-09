<?php

namespace Glhd\Linearavel\Enums;

enum ProjectUpdateHealthType: string
{
	case onTrack = 'onTrack';
	case atRisk = 'atRisk';
	case offTrack = 'offTrack';
}
