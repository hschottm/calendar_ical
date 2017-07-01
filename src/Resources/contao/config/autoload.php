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
    'Contao\CalendarExport' => 'vendor/craffft/contao-calendar-ical-bundle/src/Resources/contao/classes/CalendarExport.php',
    'Contao\CalendarImport' => 'vendor/craffft/contao-calendar-ical-bundle/src/Resources/contao/classes/CalendarImport.php',
    'Contao\ContentICal'    => 'vendor/craffft/contao-calendar-ical-bundle/src/Resources/contao/classes/ContentICal.php',
    'Contao\Csv'            => 'vendor/craffft/contao-calendar-ical-bundle/src/Resources/contao/classes/Csv.php',
    'Contao\CsvParser'      => 'vendor/craffft/contao-calendar-ical-bundle/src/Resources/contao/classes/CsvParser.php',
    'Contao\CsvReader'      => 'vendor/craffft/contao-calendar-ical-bundle/src/Resources/contao/classes/CsvReader.php',
));

/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
    'be_import_calendar'              => 'vendor/craffft/contao-calendar-ical-bundle/src/Resources/contao/templates',
    'be_import_calendar_confirmation' => 'vendor/craffft/contao-calendar-ical-bundle/src/Resources/contao/templates',
    'be_import_calendar_csv_headers'  => 'vendor/craffft/contao-calendar-ical-bundle/src/Resources/contao/templates',
    'ce_ical'                         => 'vendor/craffft/contao-calendar-ical-bundle/src/Resources/contao/templates',
));
