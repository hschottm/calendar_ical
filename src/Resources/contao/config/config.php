<?php

/*
 * This file is part of the Contao Calendar iCal Bundle.
 *
 * (c) Helmut Schottmüller 2009-2013 <https://github.com/hschottm>
 * (c) Daniel Kiesel 2017 <https://github.com/iCodr8>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Content elements
 */
$GLOBALS['TL_CTE']['files']['ical'] = 'ContentICal';

$GLOBALS['BE_MOD']['content']['calendar']['import'] = array('CalendarImport', 'importCalendar');
$GLOBALS['BE_MOD']['content']['calendar']['stylesheet'] = 'bundles/craffftcontaocalendarical/calendar-ical.css';

/**
 * Cron jobs
 */
$GLOBALS['TL_CRON']['daily'][] = array('CalendarExport', 'generateSubscriptions');

/**
 * Add 'ical' to the URL keywords to prevent problems with URL manipulating modules like folderurl
 */
$GLOBALS['TL_CONFIG']['urlKeywords'] .= (strlen(trim($GLOBALS['TL_CONFIG']['urlKeywords'])) ? ',' : '') . 'ical';

$GLOBALS['TL_HOOKS']['removeOldFeeds'][] = array('CalendarExport', 'removeOldSubscriptions');
$GLOBALS['TL_HOOKS']['getAllEvents'][] = array('CalendarImport', 'getAllEvents');

/**
 * Module variables
 */
$GLOBALS['calendar_ical']['endDateTimeDifferenceInDays'] = 365;
