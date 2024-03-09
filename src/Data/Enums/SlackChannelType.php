<?php

namespace Glhd\Linearavel\Data\Enums;

enum SlackChannelType : string
{
    case DirectMessage = 'DirectMessage';
    case MultiPersonDirectMessage = 'MultiPersonDirectMessage';
    case Private = 'Private';
    case Public = 'Public';
}
