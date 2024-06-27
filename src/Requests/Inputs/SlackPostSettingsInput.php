<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\SlackChannelType;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/SlackPostSettingsInput */
class SlackPostSettingsInput
{
	public function __construct(public string $channel, public string $channelId, public string $configurationUrl, public ?SlackChannelType $channelType = null)
	{
	}
}
