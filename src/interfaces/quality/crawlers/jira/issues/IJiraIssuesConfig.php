<?php
namespace extas\interfaces\quality\crawlers\jira\issues;

/**
 * Interface IJiraIssuesConfig
 *
 * @package extas\interfaces\quality\crawlers\jira\issues
 * @author jeyroik@gmail.com
 */
interface IJiraIssuesConfig
{
    public const SUBJECT = 'extas.quality.crawler.jira.issues.config';

    public const FIELD__ISSUES = 'issues';
    public const FIELD__PROJECTS = 'projects';
    public const FIELD__DONE_TYPES = 'done';
    public const FIELD__LIMIT = 'limit';

    /**
     * @return string[]
     */
    public function getProjectsKeys(): array;

    /**
     * @return string[]
     */
    public function getDoneTypes(): array;

    /**
     * @return int
     */
    public function getLimit(): int;
}
