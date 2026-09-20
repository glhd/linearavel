<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationEntityCardWidgetArgsType */
enum AiConversationEntityCardWidgetArgsType: string
{
	case Issue = 'Issue';
	case IssueDraft = 'IssueDraft';
	case Draft = 'Draft';
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
	case Meeting = 'Meeting';
	case CustomView = 'CustomView';
	case Dashboard = 'Dashboard';
	case PullRequest = 'PullRequest';
	case Release = 'Release';
	case ReleasePipeline = 'ReleasePipeline';
	case ReleaseNote = 'ReleaseNote';
	case AiPrompt = 'AiPrompt';
	case AiPromptRules = 'AiPromptRules';
	case AgentSession = 'AgentSession';
	case AiConversation = 'AiConversation';
}
