<?php
namespace extas\components\plugins;

use extas\components\quality\crawlers\jira\issues\rates\JiraIssuesRate;
use extas\interfaces\quality\crawlers\jira\issues\rates\IJiraIssuesRateRepository;

/**
 * Class PluginInstallJiraIssuesRates
 *
 * @package extas\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallJiraIssuesRates extends PluginInstallDefault
{
    protected string $selfItemClass = JiraIssuesRate::class;
    protected string $selfName = 'jira issues rate';
    protected string $selfSection = 'jira_issues_rates';
    protected string $selfRepositoryClass = IJiraIssuesRateRepository::class;
    protected string $selfUID = JiraIssuesRate::FIELD__MONTH;
}
