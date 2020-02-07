<?php
namespace extas\components\plugins\quality\crawlers;

use extas\components\quality\crawlers\Crawler;
use extas\components\quality\crawlers\jira\issues\JiraIssuesConfig;
use extas\components\quality\crawlers\jira\issues\rates\JiraIssuesRate;
use extas\components\quality\crawlers\jira\JiraClient;
use extas\components\quality\crawlers\jira\JiraSearchJQL;
use extas\components\quality\crawlers\jira\TJiraConfiguration;
use extas\components\SystemContainer;
use extas\interfaces\quality\crawlers\ICrawler;
use extas\interfaces\quality\crawlers\jira\IJiraIssue;
use extas\interfaces\quality\crawlers\jira\IJiraSearchJQL;
use extas\interfaces\quality\crawlers\jira\issues\IJiraIssuesConfig;
use extas\interfaces\quality\crawlers\jira\issues\rates\IJiraIssuesRate;
use extas\interfaces\quality\crawlers\jira\issues\rates\IJiraIssuesRateRepository;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CrawlerJiraIssues
 *
 * @package extas\components\plugins\quality\crawlers
 * @author jeyroik@gmail.com
 */
class CrawlerJiraIssues extends Crawler
{
    use TJiraConfiguration;

    protected $title = '[Jira] Issues rates';
    protected $description = 'Calculate total and done issues rates.';

    /**
     * @param OutputInterface $output
     *
     * @return ICrawler
     */
    public function __invoke(OutputInterface &$output): ICrawler
    {
        try {
            $jiraClient = new JiraClient();
            $config = $this->getIssuesConfig();
            $issuesTotal = 0;
            $issuesDone = 0;

            foreach ($jiraClient->allTickets($this->getJql($config)) as $ticket) {
                /**
                 * @var $ticket IJiraIssue
                 */
                $output->writeln(['Operating ticket <info>' . $ticket->getKey() . '</info>']);
                if (in_array($ticket->getStatus()->getName(), $config->getDoneTypes())) {
                    $issuesDone++;
                }

                $issuesTotal++;
            }

            $output->writeln([
                'Total issues: <info>' . $issuesTotal . '</info>',
                'Done issues: <info>' . $issuesDone . '</info>'
            ]);

            $this->saveRate($issuesTotal, $issuesDone, $output);
            return $this;

        } catch (\Exception $e) {
            $messages = explode('\n', $e->getMessage());
            $output->writeln($messages);
            return $this;
        }
    }

    /**
     * @param int $issuesTotal
     * @param int $issuesDone
     * @param OutputInterface $output
     */
    protected function saveRate(int $issuesTotal, int $issuesDone, OutputInterface &$output)
    {
        /**
         * @var $repo IJiraIssuesRateRepository
         * @var $exist IJiraIssuesRate
         */
        $repo = SystemContainer::getItem(IJiraIssuesRateRepository::class);
        $exist = $repo->one([IJiraIssuesRate::FIELD__MONTH => date('Ym')]);

        if ($exist) {
            $exist->setRate((float)$issuesTotal)->setRateDone($issuesDone)->setTimestamp(time());
            $repo->update($exist);
            $output->writeln(['<info>Rates updated</info>']);
        } else {
            $repo->create(new JiraIssuesRate([
                JiraIssuesRate::FIELD__MONTH => date('Ym'),
                JiraIssuesRate::FIELD__TIMESTAMP => time(),
                JiraIssuesRate::FIELD__RATE => (float) $issuesTotal,
                JiraIssuesRate::FIELD__RATE_DONE => $issuesDone
            ]));
            $output->writeln(['<info>Rates created</info>']);
        }
    }

    /**
     * @param IJiraIssuesConfig $config
     *
     * @return IJiraSearchJQL
     * @throws \Exception
     */
    protected function getJql(IJiraIssuesConfig $config): IJiraSearchJQL
    {
        $jql = new JiraSearchJQL();
        $jql->updatedDate(
            JiraSearchJQL::CONDITION__LOWER,
            JiraSearchJQL::DATE__END_OF_MONTH,
            -1
        )->updatedDate(
            JiraSearchJQL::CONDITION__GREATER,
            JiraSearchJQL::DATE__START_OF_MONTH,
            -1
        );

        $keys = $config->getProjectsKeys();
        if (!empty($keys)) {
            $jql->projectKey($keys);
        }

        $jql->returnFields([IJiraIssue::FIELD__STATUS]);

        return $jql;
    }

    /**
     * @return IJiraIssuesConfig
     * @throws \Exception
     */
    protected function getIssuesConfig(): IJiraIssuesConfig
    {
        $cfg = $this->cfg();
        $issuesConfig = isset($cfg[IJiraIssuesConfig::FIELD__ISSUES]) ? $cfg[IJiraIssuesConfig::FIELD__ISSUES] : [];

        return new JiraIssuesConfig($issuesConfig);
    }
}
