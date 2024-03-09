<?php

namespace Glhd\Linearavel\Enums;

enum UserFlagType : string
{
    case updatedSlackThreadSyncIntegration = 'updatedSlackThreadSyncIntegration';
    case completedOnboarding = 'completedOnboarding';
    case desktopInstalled = 'desktopInstalled';
    case teamsPageIntroductionDismissed = 'teamsPageIntroductionDismissed';
    case joinTeamIntroductionDismissed = 'joinTeamIntroductionDismissed';
    case desktopDownloadToastDismissed = 'desktopDownloadToastDismissed';
    case emptyBacklogDismissed = 'emptyBacklogDismissed';
    case emptyCustomViewsDismissed = 'emptyCustomViewsDismissed';
    case emptyActiveIssuesDismissed = 'emptyActiveIssuesDismissed';
    case emptyMyIssuesDismissed = 'emptyMyIssuesDismissed';
    case triageWelcomeDismissed = 'triageWelcomeDismissed';
    case cycleWelcomeDismissed = 'cycleWelcomeDismissed';
    case projectWelcomeDismissed = 'projectWelcomeDismissed';
    case projectBacklogWelcomeDismissed = 'projectBacklogWelcomeDismissed';
    case projectUpdatesWelcomeDismissed = 'projectUpdatesWelcomeDismissed';
    case analyticsWelcomeDismissed = 'analyticsWelcomeDismissed';
    case insightsWelcomeDismissed = 'insightsWelcomeDismissed';
    case insightsHelpDismissed = 'insightsHelpDismissed';
    case figmaPromptDismissed = 'figmaPromptDismissed';
    case issueMovePromptCompleted = 'issueMovePromptCompleted';
    case migrateThemePreference = 'migrateThemePreference';
    case listSelectionTip = 'listSelectionTip';
    case canPlaySnake = 'canPlaySnake';
    case canPlayTetris = 'canPlayTetris';
    case importBannerDismissed = 'importBannerDismissed';
    case tryInvitePeopleDismissed = 'tryInvitePeopleDismissed';
    case tryRoadmapsDismissed = 'tryRoadmapsDismissed';
    case tryCyclesDismissed = 'tryCyclesDismissed';
    case tryTriageDismissed = 'tryTriageDismissed';
    case tryGithubDismissed = 'tryGithubDismissed';
    case rewindBannerDismissed = 'rewindBannerDismissed';
    case helpIslandFeatureInsightsDismissed = 'helpIslandFeatureInsightsDismissed';
    case dueDateShortcutMigration = 'dueDateShortcutMigration';
    case slackCommentReactionTipShown = 'slackCommentReactionTipShown';
    case issueLabelSuggestionUsed = 'issueLabelSuggestionUsed';
    case threadedCommentsNudgeIsSeen = 'threadedCommentsNudgeIsSeen';
    case desktopTabsOnboardingDismissed = 'desktopTabsOnboardingDismissed';
    case milestoneOnboardingIsSeenAndDismissed = 'milestoneOnboardingIsSeenAndDismissed';
    case projectBoardOnboardingIsSeenAndDismissed = 'projectBoardOnboardingIsSeenAndDismissed';
    case figmaPluginBannerDismissed = 'figmaPluginBannerDismissed';
    case all = 'all';
}
