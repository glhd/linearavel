<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/IdentityProviderType */
enum IdentityProviderType: string
{
	case general = 'general';
	case webForms = 'webForms';
}
