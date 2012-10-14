<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * @copyright  Helmut Schottmüller 2009
 * @author     Helmut Schottmüller <typolight@aurealis.de>
 * @package    calendar_ical
 * @license    LGPL
 * @filesource
 */


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_calendar']['ical_alias'] = array('iCal alias', 'Here you can enter a unique filename (without extension). The iCal subscription file will be auto-generated in the root directory of your TYPOlight installation, e.g. as <em>name.ics</em>.');
$GLOBALS['TL_LANG']['tl_calendar']['ical_prefix'] = array('Title prefix', 'Here you can enter a prefix that will be added to every event title in the iCal subscription.');
$GLOBALS['TL_LANG']['tl_calendar']['ical_description']    = array('iCal description', 'Please enter a short description of the calendar.');
$GLOBALS['TL_LANG']['tl_calendar']['make_ical']      = array('Generate iCal subscription', 'Generate an iCal subscription file from the calendar.');
$GLOBALS['TL_LANG']['tl_calendar']['ical_source']      = array('iCal web source', 'Create a calendar from an iCal web source.');
$GLOBALS['TL_LANG']['tl_calendar']['ical_url']      = array('iCal URL', 'Please enter the URL to the iCal .ics file.');
$GLOBALS['TL_LANG']['tl_calendar']['ical_cache']      = array('Calendar cache in seconds', 'Please enter the minimum number of seconds to cache the calender data. The calendar data will be rebuilt from the iCal source when the cache time is up.');
$GLOBALS['TL_LANG']['tl_calendar']['ical_timezone']      = array('Timezone', 'Please select a timezone that should be used if the calendar doesn\'t contain a timezone.');
$GLOBALS['TL_LANG']['tl_calendar']['ical_start']    = array('Start date', 'Please enter the start date of the calendar. If you do not enter a date, the actual date will be taken as start date.');
$GLOBALS['TL_LANG']['tl_calendar']['ical_end']      = array('End date', 'Please enter the end date of the calendar. If you do not enter a date, the date in one year will be taken as end date.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_calendar']['ical_legend']      = 'iCal settings';

?>