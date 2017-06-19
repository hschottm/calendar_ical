<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * @copyright  Helmut Schottmüller 2009-2012
 * @author     Helmut Schottmüller <contao@aurealis.de>
 * @package    calendar_ical
 * @license    LGPL
 * @filesource
 */

$GLOBALS['TL_LANG']['tl_calendar_events']['icssource']             = array('File source', 'Please choose the iCal (.ics) or CSV (.csv) file you want to import from your device.');
$GLOBALS['TL_LANG']['tl_calendar_events']['import']                = array('Calendar import', 'Import events from an iCal (.ics) or CSV (.csv) file');
$GLOBALS['TL_LANG']['tl_calendar_events']['check']                = 'Check';
$GLOBALS['TL_LANG']['tl_calendar_events']['untitled']                = 'Untitled';
$GLOBALS['TL_LANG']['tl_calendar_events']['dateFormat']                = '%Y-%m-%d';
$GLOBALS['TL_LANG']['tl_calendar_events']['timeFormat']                = '%H:%M';
$GLOBALS['TL_LANG']['tl_calendar_events']['importStartDate']       = array('Start date', 'Please enter the start date for the calendar import. All events occuring before the start date will be omitted.');
$GLOBALS['TL_LANG']['tl_calendar_events']['importEndDate']         = array('End date', 'Please enter the end date for the calendar import. All events occuring after the end date will be omitted.');
$GLOBALS['TL_LANG']['tl_calendar_events']['encoding']         = array('Encoding', 'Please select the text encoding of your import data.');
$GLOBALS['TL_LANG']['tl_calendar_events']['importDeleteCalendar']  = array('Remove existing events', 'Choose this option to remove the existing events in this calendar before the new calendar will be imported.');
$GLOBALS['TL_LANG']['tl_calendar_events']['correctTimezone']       = array('Correct time zone', 'Choose this option to correct the time zone of the import file and assign the current time zone of this TYPOlight installation instead.');
$GLOBALS['TL_LANG']['tl_calendar_events']['proceed']               = array('Proceed', 'Proceed with the import process.');
$GLOBALS['TL_LANG']['tl_calendar_events']['timezone']              = array('Time zone', 'Please select your time zone.');
$GLOBALS['TL_LANG']['tl_calendar_events']['confirmationTimezone']  = 'TYPOlight has detected that the system time zone \'%s\' is different from the time zone of the import file which is \'%s\'. This may lead to time shifts in the calendar events.';
$GLOBALS['TL_LANG']['tl_calendar_events']['confirmationMissingTZ'] = 'TYPOlight has detected that the import file was created without a given time zone. Your system time zone is \'%s\'. Please select a time zone for the events in the import file to add a time zone for each event. Please note that selecting another time zone than the intended time zone of the events, this could lead to time shifts in the calender events.';
$GLOBALS['TL_LANG']['tl_calendar_events']['importDateFormat']            = array('Date Format', 'Please enter the date format of your import date fields.');
$GLOBALS['TL_LANG']['tl_calendar_events']['importTimeFormat']            = array('Time Format', 'Please enter the time format of your import time fields.');
$GLOBALS['TL_LANG']['tl_calendar_events']['importTimeShift']            = array('Manual time shift', 'Please enter the number of hours to shift each of the events. This should only be used if the automatic timezone detection is not working.');
$GLOBALS['TL_LANG']['tl_calendar_events']['preview'] = "Data preview";
$GLOBALS['TL_LANG']['tl_calendar_events']['fields'] = "Fields";
$GLOBALS['TL_LANG']['tl_calendar_events']['details']      = array('Event text', 'Here you can enter the event text.');

?>