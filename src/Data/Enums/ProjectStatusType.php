<?php

namespace Glhd\Linearavel\Enums;

enum ProjectStatusType : string
{
    case backlog = 'backlog';
    case planned = 'planned';
    case started = 'started';
    case paused = 'paused';
    case completed = 'completed';
    case canceled = 'canceled';
}
