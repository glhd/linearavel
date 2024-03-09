<?php

namespace Glhd\Linearavel\Data\Enums;

enum GitAutomationStates : string
{
    case draft = 'draft';
    case start = 'start';
    case review = 'review';
    case mergeable = 'mergeable';
    case merge = 'merge';
}
