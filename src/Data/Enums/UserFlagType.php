<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/UserFlagType */
enum UserFlagType: string
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
	case pulseWelcomeDismissed = 'pulseWelcomeDismissed';
	case analyticsWelcomeDismissed = 'analyticsWelcomeDismissed';
	case insightsWelcomeDismissed = 'insightsWelcomeDismissed';
	case insightsHelpDismissed = 'insightsHelpDismissed';
	case figmaPromptDismissed = 'figmaPromptDismissed';
	case issueMovePromptCompleted = 'issueMovePromptCompleted';
	case migrateThemePreference = 'migrateThemePreference';
	case listSelectionTip = 'listSelectionTip';
	case emptyParagraphSlashCommandTip = 'emptyParagraphSlashCommandTip';
	case editorSlashCommandUsed = 'editorSlashCommandUsed';
	case canPlaySnake = 'canPlaySnake';
	case canPlayTetris = 'canPlayTetris';
	case importBannerDismissed = 'importBannerDismissed';
	case tryInvitePeopleDismissed = 'tryInvitePeopleDismissed';
	case tryRoadmapsDismissed = 'tryRoadmapsDismissed';
	case tryCyclesDismissed = 'tryCyclesDismissed';
	case tryTriageDismissed = 'tryTriageDismissed';
	case tryGithubDismissed = 'tryGithubDismissed';
	case tryCursorDismissed = 'tryCursorDismissed';
	case tryCodexDismissed = 'tryCodexDismissed';
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
	case initiativesBannerDismissed = 'initiativesBannerDismissed';
	case commandMenuClearShortcutTip = 'commandMenuClearShortcutTip';
	case slackBotWelcomeMessageShown = 'slackBotWelcomeMessageShown';
	case slackAiFeedbackAcknowledgementShown = 'slackAiFeedbackAcknowledgementShown';
	case teamsBotWelcomeMessageShown = 'teamsBotWelcomeMessageShown';
	case slackAgentPromoFromCreateNewIssueShown = 'slackAgentPromoFromCreateNewIssueShown';
	case agentExamplesDismissed = 'agentExamplesDismissed';
	case agentHomePageNotice = 'agentHomePageNotice';
	case agentHomeHeadlineSeen = 'agentHomeHeadlineSeen';
	case agentSharedSkillsPromoDismissed = 'agentSharedSkillsPromoDismissed';
	case agentSharedSkillsSplashAnimationSeen = 'agentSharedSkillsSplashAnimationSeen';
	case agentLoopsPromoShown = 'agentLoopsPromoShown';
	case loopEditRestrictionSpeedbumpShown = 'loopEditRestrictionSpeedbumpShown';
	case slackProjectChannelsPromoDismissed = 'slackProjectChannelsPromoDismissed';
	case slackProjectChannelsPromoShown = 'slackProjectChannelsPromoShown';
	case reviewsPromptToConnectGithubDismissed = 'reviewsPromptToConnectGithubDismissed';
	case all = 'all';
}
