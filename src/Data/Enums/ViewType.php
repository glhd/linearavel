<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/ViewType */
enum ViewType: string
{
	case inbox = 'inbox';
	case myIssues = 'myIssues';
	case myIssuesCreatedByMe = 'myIssuesCreatedByMe';
	case myIssuesSubscribedTo = 'myIssuesSubscribedTo';
	case myIssuesActivity = 'myIssuesActivity';
	case userProfile = 'userProfile';
	case userProfileCreatedByUser = 'userProfileCreatedByUser';
	case board = 'board';
	case completedCycle = 'completedCycle';
	case cycle = 'cycle';
	case project = 'project';
	case projectDocuments = 'projectDocuments';
	case label = 'label';
	case triage = 'triage';
	case activeIssues = 'activeIssues';
	case backlog = 'backlog';
	case allIssues = 'allIssues';
	case customView = 'customView';
	case customViews = 'customViews';
	case customRoadmap = 'customRoadmap';
	case roadmap = 'roadmap';
	case roadmaps = 'roadmaps';
	case roadmapAll = 'roadmapAll';
	case roadmapClosed = 'roadmapClosed';
	case roadmapBacklog = 'roadmapBacklog';
	case initiative = 'initiative';
	case initiatives = 'initiatives';
	case projects = 'projects';
	case projectsAll = 'projectsAll';
	case projectsBacklog = 'projectsBacklog';
	case projectsClosed = 'projectsClosed';
	case search = 'search';
	case splitSearch = 'splitSearch';
	case teams = 'teams';
	case archive = 'archive';
	case quickView = 'quickView';
}
