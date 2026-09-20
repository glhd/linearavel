<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationEntityListWidgetArgsEntitiesType */
enum AiConversationEntityListWidgetArgsEntitiesType: string
{
	case Issue = 'Issue';
	case IssueDraft = 'IssueDraft';
	case Project = 'Project';
	case ProjectDraft = 'ProjectDraft';
	case ProjectMilestone = 'ProjectMilestone';
	case Initiative = 'Initiative';
	case InitiativeUpdate = 'InitiativeUpdate';
	case ProjectUpdate = 'ProjectUpdate';
	case WorkflowDefinition = 'WorkflowDefinition';
	case Team = 'Team';
	case Template = 'Template';
	case Customer = 'Customer';
	case CustomerNeed = 'CustomerNeed';
	case Document = 'Document';
	case CustomView = 'CustomView';
	case Dashboard = 'Dashboard';
	case PullRequest = 'PullRequest';
	case Release = 'Release';
	case ReleasePipeline = 'ReleasePipeline';
	case ReleaseNote = 'ReleaseNote';
	case AiPrompt = 'AiPrompt';
	case AiPromptRules = 'AiPromptRules';
	case AgentSession = 'AgentSession';
}
