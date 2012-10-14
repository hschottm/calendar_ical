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
$GLOBALS['TL_LANG']['tl_content']['ical_calendar'] = array('Calendars', 'Please choose one or more calendars.');
$GLOBALS['TL_LANG']['tl_content']['ical_start']    = array('Start date', 'Please enter the start date of the calendar. If you do not enter a date, the actual date will be taken as start date.');
$GLOBALS['TL_LANG']['tl_content']['ical_end']      = array('End date', 'Please enter the end date of the calendar. If you do not enter a date, the date in one year will be taken as end date.');
$GLOBALS['TL_LANG']['tl_content']['ical_title'] = 'Download iCal';
$GLOBALS['TL_LANG']['tl_content']['ical_prefix'] = array('Title prefix', 'Here you can enter a prefix that will be added to every event title in the iCal subscription.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_content']['calendar_legend']      = 'Calendar settings';

?>