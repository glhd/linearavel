<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationMemoryToolCallArgsAction */
enum AiConversationMemoryToolCallArgsAction: string
{
	case list = 'list';
	case read = 'read';
	case save = 'save';
	case delete = 'delete';
}
