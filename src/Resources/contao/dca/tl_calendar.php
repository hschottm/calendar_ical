<?php

/**
 * Table tl_content
 */

$GLOBALS['TL_DCA']['tl_calendar']['config']['onload_callback'][] = array('tl_calendar_ical', 'generate_ical');
$GLOBALS['TL_DCA']['tl_calendar']['config']['onsubmit_callback'][] = array('CalendarImport', 'importFromURL');

$GLOBALS['TL_DCA']['tl_calendar']['palettes']['default'] = $GLOBALS['TL_DCA']['tl_calendar']['palettes']['default'] . ';{ical_legend:hide},make_ical,ical_source';
$GLOBALS['TL_DCA']['tl_calendar']['palettes']['__selector__'][] = 'make_ical';
$GLOBALS['TL_DCA']['tl_calendar']['palettes']['__selector__'][] = 'ical_source';
$GLOBALS['TL_DCA']['tl_calendar']['subpalettes']['make_ical'] = 'ical_alias,ical_prefix,ical_description,ical_start,ical_end';
$GLOBALS['TL_DCA']['tl_calendar']['subpalettes']['ical_source'] = 'ical_url,ical_timezone,ical_cache,ical_source_start,ical_source_end';

$GLOBALS['TL_DCA']['tl_calendar']['fields']['make_ical'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_calendar']['make_ical'],
	'exclude'                 => true,
	'filter'                  => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_calendar']['fields']['ical_timezone'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_calendar']['ical_timezone'],
	'default'                 => 0,
	'exclude'                 => true,
	'filter'                  => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_calendar_ical', 'getTZ'),
	'eval'                    => array('doNotCopy'=>true, 'tl_class'=>'w50'),
	'sql'                     => "varchar(128) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_calendar']['fields']['ical_source'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_calendar']['ical_source'],
	'exclude'                 => true,
	'filter'                  => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_calendar']['fields']['ical_alias'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_calendar']['ical_alias'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'alnum', 'unique'=>true, 'spaceToUnderscore'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
	'sql'                     => "varbinary(128) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_calendar']['fields']['ical_prefix'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_calendar']['ical_prefix'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>128, 'tl_class'=>'w50'),
	'sql'                     => "varchar(128) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_calendar']['fields']['ical_description'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_calendar']['ical_description'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'textarea',
	'eval'                    => array('style'=>'height:60px;', 'tl_class'=>'clr'),
	'sql'                     => "text NULL"
);

$GLOBALS['TL_DCA']['tl_calendar']['fields']['ical_url'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_calendar']['ical_url'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'long'),
	'sql'                     => "text NULL"
);

$GLOBALS['TL_DCA']['tl_calendar']['fields']['ical_cache'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_calendar']['ical_cache'],
	'default'                 => 86400,
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp' => 'digit', 'tl_class'=>'w50'),
	'sql'                     => "int(10) unsigned NOT NULL default '86400'"
);

$GLOBALS['TL_DCA']['tl_calendar']['fields']['ical_start'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_calendar']['ical_start'],
	'default'                 => time(),
	'exclude'                 => true,
	'filter'                  => true,
	'flag'                    => 8,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>false,'maxlength'=>10, 'rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'clr w50 wizard'),
	'sql'                     => "varchar(12) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_calendar']['fields']['ical_end'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_calendar']['ical_end'],
	'default'                 => time()+365*24*3600,
	'exclude'                 => true,
	'filter'                  => true,
	'flag'                    => 8,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>false,'maxlength'=>10, 'rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'w50 wizard'),
	'sql'                     => "varchar(12) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_calendar']['fields']['ical_source_start'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_calendar']['ical_start'],
	'default'                 => time(),
	'exclude'                 => true,
	'filter'                  => true,
	'flag'                    => 8,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>false,'maxlength'=>10, 'rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'clr w50 wizard'),
	'sql'                     => "varchar(12) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_calendar']['fields']['ical_source_end'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_calendar']['ical_end'],
	'default'                 => time()+365*24*3600,
	'exclude'                 => true,
	'filter'                  => true,
	'flag'                    => 8,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>false,'maxlength'=>10, 'rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'w50 wizard'),
	'sql'                     => "varchar(12) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_calendar']['fields']['ical_importing'] = array
(
	'sql'                     => "char(1) NOT NULL default ''"
);

/**
 * Class tl_calendar_ical
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Helmut Schottmüller 2009-2013
 * @author     Helmut Schottmüller <https://github.com/hschottm>
 * @package    Controller
 */
class tl_calendar_ical extends Backend
{
	public function getTZ()
	{
		return $this->getTimezones();
	}
	
	/**
	 * Update the RSS feed
	 * @param object
	 */
	public function generate_ical(DataContainer $dc)
	{
		if (!$dc->id)
		{
			return;
		}

		$this->import('CalendarExport');
		$this->CalendarExport->exportCalendar($dc->id);
	}
}

