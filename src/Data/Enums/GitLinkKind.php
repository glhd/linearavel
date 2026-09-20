<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/GitLinkKind */
enum GitLinkKind: string
{
	case closes = 'closes';
	case contributes = 'contributes';
	case links = 'links';
}
