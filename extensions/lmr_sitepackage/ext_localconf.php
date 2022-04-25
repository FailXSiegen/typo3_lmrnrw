<?php

/*
 *
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 *
 */

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$_EXTCONF = unserialize($_EXTCONF);

call_user_func(function ($extKey, $extConf) {
    // Set our own default RTE config
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['default'] =
        'EXT:lmr_sitepackage/Configuration/RTE/Default.yaml';
}, $_EXTKEY, $_EXTCONF);
