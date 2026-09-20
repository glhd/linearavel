<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/WorkflowActivationMode */
enum WorkflowActivationMode: string
{
	case conditionsStartedMatching = 'conditionsStartedMatching';
	case anyUpdate = 'anyUpdate';
	case watchedPropertyChanged = 'watchedPropertyChanged';
	case collectionChanged = 'collectionChanged';
}
