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

    /**
     * @return string[]
     */
    public function getProjectsKeys(): array;

    /**
     * @return string[]
     */
    public function getDoneTypes(): array;
}
