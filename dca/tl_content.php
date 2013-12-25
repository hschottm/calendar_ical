<?php

/**
 * Table tl_content
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['ical'] = '{type_legend},type,headline;{calendar_legend},ical_calendar,ical_start,ical_end,ical_prefix;{link_legend},linkTitle;{protected_legend:hide},protected;{expert_legend},{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_content']['fields']['ical_calendar'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ical_calendar'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options_callback'        => array('tl_content_ical', 'getCalendars'),
	'eval'                    => array('mandatory'=>true,'multiple'=>true),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['ical_prefix'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ical_prefix'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>128, 'tl_class'=>'w50'),
	'sql'                     => "varchar(128) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['ical_start'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ical_start'],
	'default'                 => time(),
	'exclude'                 => true,
	'filter'                  => true,
	'flag'                    => 8,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>false,'maxlength'=>10, 'rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'w50 wizard'),
	'sql'                     => "varchar(12) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['ical_end'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ical_end'],
	'default'                 => time()+365*24*3600,
	'exclude'                 => true,
	'filter'                  => true,
	'flag'                    => 8,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>false,'maxlength'=>10, 'rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'w50 wizard'),
	'sql'                     => "varchar(12) NOT NULL default ''"
);

/**
 * Class tl_content_ical
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Helmut Schottmüller 2009-2013
 * @author     Helmut Schottmüller <https://github.com/hschottm>
 * @package    Controller
 */
class tl_content_ical extends Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	/**
	 * Get all calendars and return them as array
	 * @return array
	 */
	public function getCalendars()
	{
		if (!$this->User->isAdmin && !is_array($this->User->calendars))
		{
			return array();
		}

		$arrForms = array();
		$objForms = $this->Database->execute("SELECT id, title FROM tl_calendar ORDER BY title");

		while ($objForms->next())
		{
			if ($this->User->isAdmin || in_array($objForms->id, $this->User->calendars))
			{
				$arrForms[$objForms->id] = $objForms->title;
			}
		}
		return $arrForms;
	}
}

