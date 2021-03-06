<?php
namespace AOE\Crawler\Task;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 AOE GmbH <dev@aoe.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Scheduler\Task\AbstractTask;

/**
 * Class FlushQueueTask
 *
 * @package AOE\Crawler\Task
 * @codeCoverageIgnore
 */
class FlushQueueTask extends AbstractTask
{
    /**
     * @var string $mode
     */
    public $mode = 'all';

    /**
     * Function executed from the Scheduler.
     *
     * @return bool
     */
    public function execute()
    {
        $_SERVER['argv'] = array($_SERVER['argv'][0], '0', '-o', $this->mode);
        /* @var $crawlerObject \tx_crawler_lib */
        $crawlerObject = GeneralUtility::makeInstance('tx_crawler_lib');

        return $crawlerObject->CLI_main_flush();
    }
}