<?php

namespace Contao;

/**
 * Class CsvParser
 *
 * CSV parser class for "ical".
 * @copyright  Helmut Schottmüller 2012-2013
 * @author     Helmut Schottmüller <https://github.com/hschottm>
 * @package    Controller
 */
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
