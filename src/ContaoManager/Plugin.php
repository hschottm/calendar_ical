<?php

namespace Craffft\ContaoCalendarICalBundle\ContaoManager;

use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

class Plugin implements BundlePluginInterface
{
	/**
	 * {@inheritdoc}
	 */
	public function getBundles(ParserInterface $parser)
	{
        return [
            BundleConfig::create('Craffft\ContaoCalendarICalBundle\CraffftContaoCalendarICalBundle')
                ->setLoadAfter(['Contao\CoreBundle\ContaoCoreBundle'])
                ->setReplace(['cto-calendar-ical-bundle']),
        ];
	}
}
