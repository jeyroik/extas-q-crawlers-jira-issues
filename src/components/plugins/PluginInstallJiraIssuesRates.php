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
    protected $selfItemClass = JiraIssuesRate::class;
    protected $selfName = 'jira issues rate';
    protected $selfSection = 'jira_issues_rates';
    protected $selfRepositoryClass = IJiraIssuesRateRepository::class;
    protected $selfUID = JiraIssuesRate::FIELD__MONTH;
}
