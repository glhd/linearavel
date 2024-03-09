<?php

namespace Glhd\Linearavel\Enums;

enum ReleaseChannel : string
{
    case internal = 'internal';
    case beta = 'beta';
    case preRelease = 'preRelease';
    case public = 'public';
}
