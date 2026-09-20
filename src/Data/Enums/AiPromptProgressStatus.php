<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiPromptProgressStatus */
enum AiPromptProgressStatus: string
{
	case created = 'created';
	case inProgress = 'inProgress';
	case finished = 'finished';
	case failed = 'failed';
	case canceled = 'canceled';
}
