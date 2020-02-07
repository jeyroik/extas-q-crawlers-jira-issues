<?php
namespace extas\components\quality\crawlers\jira\issues\rates;

use extas\components\Item;
use extas\components\quality\crawlers\jira\THasMonth;
use extas\components\quality\crawlers\jira\THasRate;
use extas\components\quality\crawlers\jira\THasTimestamp;
use extas\interfaces\quality\crawlers\jira\issues\rates\IJiraIssuesRate;

/**
 * Class JiraIssuesRate
 *
 * @package extas\components\quality\crawlers\jira\issues\rates
 * @author jeyroik@gmail.com
 */
class JiraIssuesRate extends Item implements IJiraIssuesRate
{
    use THasRate;
    use THasMonth;
    use THasTimestamp;

    /**
     * @return int
     */
    public function getRateDone(): int
    {
        return $this->config[static::FIELD__RATE_DONE] ?? 0;
    }

    /**
     * @param int $rateDone
     *
     * @return IJiraIssuesRate
     */
    public function setRateDone(int $rateDone): IJiraIssuesRate
    {
        $this->config[static::FIELD__RATE_DONE] = $rateDone;

        return $this;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
