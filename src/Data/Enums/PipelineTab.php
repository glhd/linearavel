<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/PipelineTab */
enum PipelineTab: string
{
	case releaseNotes = 'releaseNotes';
	case releases = 'releases';
}
