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
    const SUBJECT = 'extas.quality.crawler.jira.issues';

    const FIELD__RATE_DONE = 'rate_done';

    /**
     * @return int
     */
    public function getRateDone(): int;

    /**
     * @param int $rateDone
     *
     * @return IJiraIssuesRate
     */
    public function setRateDone(int $rateDone): IJiraIssuesRate;
}
