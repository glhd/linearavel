<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\SlackChannelType;

class SlackPostSettingsInput
{
	public function __construct(public string $channel, public string $channelId, public string $configurationUrl, public ?SlackChannelType $channelType = null)
	{
	}
}
