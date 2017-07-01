<?php

namespace Contao;

/**
 * Class CsvReader
 *
 * CSV parser class for "ical".
 * @copyright  Helmut Schottmüller 2012-2013
 * @author     Helmut Schottmüller <https://github.com/hschottm>
 * @package    Controller
 */
class CsvReader implements \Iterator
{

    protected $fileHandle = null;
    protected $position = null;
    protected $filename = null;
    protected $currentLine = null;
    protected $currentArray = null;
    protected $separator = ',';
    protected $encoding = 'utf8';

    public function __construct($filename, $separator = ',', $encoding = 'utf8')
    {
        $this->separator = $separator;
        $this->fileHandle = fopen($filename, 'r');
        if (!$this->fileHandle) {
            return;
        }
        $this->filename = $filename;
        $this->position = 0;
        $this->encoding = $encoding;
        $this->_readLine();
    }

    public function __destruct()
    {
        $this->close();
    }

    // You should not have to call it unless you need to
    // explicitly free the file descriptor
    public function close()
    {
        if ($this->fileHandle) {
            fclose($this->fileHandle);
            $this->fileHandle = null;
        }
    }

    public function rewind()
    {
        if ($this->fileHandle) {
            $this->position = 0;
            rewind($this->fileHandle);
        }

        $this->_readLine();
    }

    public function current()
    {
        return $this->currentArray;
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position++;
        $this->_readLine();
    }

    public function valid()
    {
        return $this->currentArray !== null;
    }

    protected function _readLine()
    {
        if (!feof($this->fileHandle)) {
            $this->currentLine = trim(fgets($this->fileHandle));
        } else {
            $this->currentLine = null;
        }
        if (strcmp($this->encoding, 'utf8') != 0 && null != $this->currentLine) {
            $this->currentLine = utf8_encode($this->currentLine);
        }
        if ($this->currentLine != '') {
            $this->currentArray = Csv::parseString($this->currentLine, $this->separator);
        } else {
            $this->currentArray = null;
        }
    }
}
