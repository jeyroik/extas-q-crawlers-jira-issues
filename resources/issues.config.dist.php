<?php

use extas\interfaces\quality\crawlers\jira\issues\IJiraIssuesConfig as I;

return [
    I::FIELD__ISSUES => [
        I::FIELD__PROJECTS => [],
        I::FIELD__DONE_TYPES => ['Готово', 'Done', 'На проде']
    ]
];
