<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/CodingSessionsDisabledReason */
enum CodingSessionsDisabledReason: string
{
	case CODING_SESSIONS_DISABLED = 'CODING_SESSIONS_DISABLED';
	case TRUSTED_EXTERNAL_SOURCES_UNAVAILABLE = 'TRUSTED_EXTERNAL_SOURCES_UNAVAILABLE';
	case APP_NOT_TRUSTED = 'APP_NOT_TRUSTED';
}
