<?php

namespace Glhd\Linearavel\Data\Enums;

enum ProjectUpdateHealthType : string
{
    case onTrack = 'onTrack';
    case atRisk = 'atRisk';
    case offTrack = 'offTrack';
}
