<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiPromptType */
enum AiPromptType: string
{
	case productIntelligence = 'productIntelligence';
	case internalResearch = 'internalResearch';
	case projectUpdates = 'projectUpdates';
	case initiativeUpdates = 'initiativeUpdates';
	case agentGuidance = 'agentGuidance';
	case codeIntelligence = 'codeIntelligence';
	case aiConversation = 'aiConversation';
	case slackIssueIntake = 'slackIssueIntake';
	case intercomIssueIntake = 'intercomIssueIntake';
	case gongIssueIntake = 'gongIssueIntake';
	case zendeskIssueIntake = 'zendeskIssueIntake';
	case microsoftTeamsIssueIntake = 'microsoftTeamsIssueIntake';
}
