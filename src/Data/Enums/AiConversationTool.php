<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AiConversationTool */
enum AiConversationTool: string
{
	case SearchEntities = 'SearchEntities';
	case SearchSettings = 'SearchSettings';
	case ReadSetting = 'ReadSetting';
	case PatchSettings = 'PatchSettings';
	case NotifyUsers = 'NotifyUsers';
	case RetrieveEntities = 'RetrieveEntities';
	case QueryView = 'QueryView';
	case QueryActivity = 'QueryActivity';
	case QueryUpdates = 'QueryUpdates';
	case SuggestValues = 'SuggestValues';
	case CreateEntity = 'CreateEntity';
	case UpdateEntity = 'UpdateEntity';
	case DeleteEntity = 'DeleteEntity';
	case RestoreEntity = 'RestoreEntity';
	case RunLoop = 'RunLoop';
	case SpawnSubagent = 'SpawnSubagent';
	case Research = 'Research';
	case CodeIntelligence = 'CodeIntelligence';
	case StartCodingSession = 'StartCodingSession';
	case PromptCodingSession = 'PromptCodingSession';
	case ListCodingSessions = 'ListCodingSessions';
	case SuggestRepository = 'SuggestRepository';
	case CreateSandbox = 'CreateSandbox';
	case Bash = 'Bash';
	case SandboxGitHistory = 'SandboxGitHistory';
	case ReadSandboxFile = 'ReadSandboxFile';
	case ReadFile = 'ReadFile';
	case GetPullRequestDiff = 'GetPullRequestDiff';
	case GetPullRequestFile = 'GetPullRequestFile';
	case GetPullRequestCheckLogs = 'GetPullRequestCheckLogs';
	case RetryPullRequestCheck = 'RetryPullRequestCheck';
	case HandoffToCodingSession = 'HandoffToCodingSession';
	case SubscribeToEvent = 'SubscribeToEvent';
	case UnsubscribeFromEvent = 'UnsubscribeFromEvent';
	case TranscribeVideo = 'TranscribeVideo';
	case TranscribeMedia = 'TranscribeMedia';
	case Memory = 'Memory';
	case SearchDocumentation = 'SearchDocumentation';
	case ContactSupport = 'ContactSupport';
	case WebSearch = 'WebSearch';
	case GetSlackConversationHistory = 'GetSlackConversationHistory';
	case PostChatMessage = 'PostChatMessage';
	case SearchChatChannels = 'SearchChatChannels';
	case GetMicrosoftTeamsConversationHistory = 'GetMicrosoftTeamsConversationHistory';
	case SetSpendLimit = 'SetSpendLimit';
	case RemoveSpendLimit = 'RemoveSpendLimit';
	case NavigateToPage = 'NavigateToPage';
	case InvokeMcpTool = 'InvokeMcpTool';
}
