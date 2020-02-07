<?php
namespace extas\components\quality\crawlers\jira\issues\rates;

use extas\components\repositories\Repository;
use extas\interfaces\quality\crawlers\jira\issues\rates\IJiraIssuesRateRepository;

/**
 * Class JiraIssuesRateRepository
 *
 * @package extas\components\quality\crawlers\jira\issues\rates
 * @author jeyroik@gmail.com
 */
class JiraIssuesRateRepository extends Repository implements IJiraIssuesRateRepository
{
    protected $idAs = '';
    protected $scope = 'extas';
    protected $pk = JiraIssuesRate::FIELD__MONTH;
    protected $name = 'jira_issues_rates';
    protected $itemClass = JiraIssuesRate::class;
}
