<?php
namespace extas\components\plugins\quality\crawlers\jira;

use extas\components\plugins\Plugin;
use extas\interfaces\quality\crawlers\jira\issues\IJiraIssuesConfig as I;

/**
 * Class JiraIssuesConfigPlugin
 *
 * @package extas\components\plugins\quality\crawlers\jira
 * @author jeyroik@gmail.com
 */
class JiraIssuesConfigPlugin extends Plugin
{
    /**
     * @param array $config
     */
    public function __invoke(array &$config)
    {
        $qConfigPath = getenv('EXTAS__Q_JIRA_ISSUES_PATH') ?: '';
        if (is_file($qConfigPath)) {
            $qConfig = include $qConfigPath;
            $config[I::FIELD__ISSUES] = $qConfig[I::FIELD__ISSUES] ?? [];
        }
    }
}
