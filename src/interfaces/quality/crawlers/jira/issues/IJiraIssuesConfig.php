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
    const SUBJECT = 'extas.quality.crawler.jira.issues.config';

    const FIELD__ISSUES = 'issues';
    const FIELD__PROJECTS = 'projects';
    const FIELD__DONE_TYPES = 'done';
    const FIELD__LIMIT = 'limit';

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
