<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/ReleaseNoteGenerationStatus */
enum ReleaseNoteGenerationStatus: string
{
	case pending = 'pending';
	case completed = 'completed';
}
