<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/OrganizationDomainAuthType */
enum OrganizationDomainAuthType: string
{
	case saml = 'saml';
	case general = 'general';
}
