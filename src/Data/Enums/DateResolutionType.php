<?php

namespace Glhd\Linearavel\Data\Enums;

enum DateResolutionType : string
{
    case month = 'month';
    case quarter = 'quarter';
    case halfYear = 'halfYear';
    case year = 'year';
}
