<?php
namespace extas\interfaces\quality\crawlers\jira\issues\rates;

use extas\interfaces\IItem;
use extas\interfaces\quality\crawlers\jira\IHasMonth;
use extas\interfaces\quality\crawlers\jira\IHasRate;
use extas\interfaces\quality\crawlers\jira\IHasTimestamp;

/**
 * Interface IJiraIssuesRate
 *
 * @package extas\interfaces\quality\crawlers\jira\issues\rates
 * @author jeyroik@gmail.com
 */
interface IJiraIssuesRate extends IItem, IHasMonth, IHasTimestamp, IHasRate
{
    public const SUBJECT = 'extas.quality.crawler.jira.issues';

    public const FIELD__COUNT_TOTAL = 'count_total';
    public const FIELD__COUNT_DONE = 'count_done';

    /**
     * @return int
     */
    public function getCountDone(): int;

    /**
     * @return int
     */
    public function getCountTotal(): int;

    /**
     * @param int $countDone
     *
     * @return IJiraIssuesRate
     */
    public function setCountDone(int $countDone): IJiraIssuesRate;

    /**
     * @param int $countTotal
     *
     * @return IJiraIssuesRate
     */
    public function setCountTotal(int $countTotal): IJiraIssuesRate;
}
