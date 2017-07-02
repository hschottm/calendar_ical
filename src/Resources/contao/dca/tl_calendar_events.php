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
 * Table tl_calendar_events
 */
$GLOBALS['TL_DCA']['tl_calendar_events']['config']['onsubmit_callback'][] = array('tl_calendar_events_ical', 'generateICal');

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


class tl_calendar_events_ical extends Backend
{
    public function generateICal(DataContainer $dc)
    {
        if (!$dc->id) {
            return;
        }

        $calendarEvent = \Contao\CalendarEventsModel::findByPk($dc->id);

        if ($calendarEvent !== null) {
            $this->import('CalendarExport');
            $this->CalendarExport->exportCalendar($calendarEvent->pid);
        };

    }
}
