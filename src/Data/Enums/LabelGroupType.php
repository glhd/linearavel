<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/LabelGroupType */
enum LabelGroupType: string
{
	case singleSelect = 'singleSelect';
	case multiSelect = 'multiSelect';
}
