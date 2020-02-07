<?php
namespace extas\components\quality\crawlers\jira\issues;

use extas\components\Item;
use extas\interfaces\quality\crawlers\jira\issues\IJiraIssuesConfig;

/**
 * Class JiraIssuesConfig
 *
 * @package extas\components\quality\crawlers\jira\issues
 * @author jeyroik@gmail.com
 */
class JiraIssuesConfig extends Item implements IJiraIssuesConfig
{
    /**
     * @return array
     */
    public function getDoneTypes(): array
    {
        return $this->config[static::FIELD__DONE_TYPES] ?? [];
    }

    /**
     * @return array
     */
    public function getProjectsKeys(): array
    {
        return $this->config[static::FIELD__PROJECTS] ?? [];
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
