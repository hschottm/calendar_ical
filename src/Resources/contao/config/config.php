<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Content elements
 */
$GLOBALS['TL_CTE']['files']['ical'] = 'ContentICal';

$GLOBALS['BE_MOD']['content']['calendar']['import'] = array('CalendarImport', 'importCalendar');
$GLOBALS['BE_MOD']['content']['calendar']['stylesheet'] = 'system/modules/calendar_ical/assets/calendar_ical.css';

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

?>