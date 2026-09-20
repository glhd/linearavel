<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationInitialSource */
enum AiConversationInitialSource: string
{
	case slack = 'slack';
	case microsoftTeams = 'microsoftTeams';
	case mcp = 'mcp';
	case directChat = 'directChat';
	case entityChat = 'entityChat';
	case comment = 'comment';
	case pullRequestComment = 'pullRequestComment';
	case workflow = 'workflow';
	case onboarding = 'onboarding';
	case subAgent = 'subAgent';
}
