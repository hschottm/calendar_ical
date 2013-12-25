<?php 

/**
 * @copyright  Helmut Schottmüller 2009-2013
 * @author     Helmut Schottmüller <https://github.com/hschottm>
 * @package    Backend
 * @license    LGPL
 */

/**
 * Table tl_calendar_events
 */
$GLOBALS['TL_DCA']['tl_calendar_events']['list']['global_operations']['export'] = 
	array(
		'label'               => &$GLOBALS['TL_LANG']['MSC']['import_calendar'],
		'href'                => 'key=import',
		'class'               => 'header_import',
		'attributes'          => 'onclick="Backend.getScrollOffset();"'
	);

$GLOBALS['TL_DCA']['tl_calendar_events']['fields']['icssource'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['source'],
	'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true, 'extensions'=>'ics,csv')
);

