<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationSandboxGitHistoryToolCallArgsOperation */
enum AiConversationSandboxGitHistoryToolCallArgsOperation: string
{
	case log = 'log';
	case blame = 'blame';
	case search = 'search';
	case show = 'show';
}
