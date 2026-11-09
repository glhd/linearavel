<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/JiraProjectMigrationErrorCode */
enum JiraProjectMigrationErrorCode: string
{
	case invalidOptions = 'invalidOptions';
	case duplicateProject = 'duplicateProject';
	case projectNotFound = 'projectNotFound';
	case projectAlreadySyncing = 'projectAlreadySyncing';
	case projectSyncsWithAnotherTeam = 'projectSyncsWithAnotherTeam';
	case projectBeingImported = 'projectBeingImported';
	case importDeletionRunning = 'importDeletionRunning';
	case projectChanged = 'projectChanged';
	case teamNotFound = 'teamNotFound';
	case teamNotAccessible = 'teamNotAccessible';
	case teamInheritsWorkflowStatuses = 'teamInheritsWorkflowStatuses';
	case teamQuotaExceeded = 'teamQuotaExceeded';
	case legacySyncDirection = 'legacySyncDirection';
	case missingTeamCreationPermission = 'missingTeamCreationPermission';
	case missingInvitePermission = 'missingInvitePermission';
	case missingJiraAccess = 'missingJiraAccess';
	case missingWebhookPermission = 'missingWebhookPermission';
	case missingCreateIssuesPermission = 'missingCreateIssuesPermission';
	case projectNotReadable = 'projectNotReadable';
	case invalidJql = 'invalidJql';
	case noMatchingIssues = 'noMatchingIssues';
	case jiraAuthFailed = 'jiraAuthFailed';
	case jiraRateLimited = 'jiraRateLimited';
	case jiraUnavailable = 'jiraUnavailable';
}
