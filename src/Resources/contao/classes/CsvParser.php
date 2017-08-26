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

namespace Contao;

class CsvParser
{
    protected $filename;
    protected $separator;
    protected $encoding;
    protected $reader;

    public function __construct($filename, $encoding = 'utf8')
    {
        $this->filename = $filename;
        $this->separator = $this->determineSeparator();
        $this->encoding = $encoding;
        $this->reader = new CsvReader($filename, $this->separator, $this->encoding);
    }

    protected function determineSeparator()
    {
        $separators = array(',', ';');
        $file = fopen($this->filename, 'r');
        $string = fgets($file);
        fclose($file);
        $matched = array();

        foreach ($separators as $separator) {
            if (preg_match("/$separator/", $string)) {
                $matched[] = $separator;
            }
        }

        if (count($matched) == 1) {
            return $matched[0];
        } else {
            return null;
        }
    }

    public function extractHeader()
    {
        $this->reader->rewind();

        return $this->reader->current();
    }

    public function getDataArray($lines = 1)
    {
        if ($lines == 1) {
            $this->reader->next();
            if ($this->reader->valid()) {
                return $this->reader->current();
            } else {
                return false;
            }
        }

        $res = array();

        do {
            $this->reader->next();
            array_push($res, $this->reader->current());
            $lines--;
        } while ($this->reader->valid() && $lines > 0);

        if (count($res)) {
            return $res;
        } else {
            return false;
        }
    }
}
