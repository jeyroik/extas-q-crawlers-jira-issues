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
    public function getCountDone(): int
    {
        return $this->config[static::FIELD__COUNT_DONE] ?? 0;
    }

    /**
     * @return int
     */
    public function getCountTotal(): int
    {
        return $this->config[static::FIELD__COUNT_TOTAL] ?? 0;
    }

    /**
     * @param int $countDone
     *
     * @return IJiraIssuesRate
     */
    public function setCountDone(int $countDone): IJiraIssuesRate
    {
        $this->config[static::FIELD__COUNT_DONE] = $countDone;

        return $this;
    }

    /**
     * @param int $countTotal
     *
     * @return IJiraIssuesRate
     */
    public function setCountTotal(int $countTotal): IJiraIssuesRate
    {
        $this->config[static::FIELD__COUNT_TOTAL] = $countTotal;

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
