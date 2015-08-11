<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Contao\CalendarExport' => 'system/modules/calendar_ical/classes/CalendarExport.php',
	'Contao\CalendarImport' => 'system/modules/calendar_ical/classes/CalendarImport.php',
	'Contao\ContentICal'    => 'system/modules/calendar_ical/classes/ContentICal.php',
	'Contao\CSVParser'      => 'system/modules/calendar_ical/classes/CSVParser.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'be_import_calendar'              => 'system/modules/calendar_ical/templates',
	'be_import_calendar_confirmation' => 'system/modules/calendar_ical/templates',
	'be_import_calendar_csv_headers'  => 'system/modules/calendar_ical/templates',
	'ce_ical'                         => 'system/modules/calendar_ical/templates',
));
