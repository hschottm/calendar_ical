<?php

namespace Contao;

/**
 * Class CSVParser
 *
 * CSV parser class for "ical".
 * @copyright  Helmut Schottmüller 2012
 * @author     Helmut Schottmüller <contao@aurealis.de>
 * @package    Controller
 */
class CSVParser
{
	protected $handle;
	protected $filename;
	protected $rowcounter;
	protected $separator;
	protected $separators;
	protected $encoding;
	
	public function __construct($filename)
	{
		$this->filename = $filename;
		$this->handle = false;
		$this->separator = ',';
		$this->rowcounter = 0;
		$this->encoding = 'utf8';
		$this->separators = array(',', ';');
	}
	
	public function __set($name, $value) 
	{
		switch ($name)
		{
			case 'separator':
			case 'separators':
			case 'encoding':
				$this->$name = $value;
				break;
		}
	}

	public function __get($name) 
	{
		switch ($name)
		{
			case 'separator':
			case 'separators':
			case 'encoding':
				return $this->$name;
				break;
		}
		return null;
	}

	public function determineSeparator()
	{
		$maxcount = 0;
		foreach ($this->separators as $separator)
		{
			$this->openFile();
			$found = $this->readline($separator);
			if ($found !== false)
			{
				if (count($found) > $maxcount)
				{
					$maxcount = count($found);
					$this->separator = $separator;
				}
			}
		}
		$this->closeFile();
	}
	
	public function extractHeader()
	{
		return $this->readline($this->separator);
	}
	
	public function getDataArray($lines = 1)
	{
		if ($lines == 1)
		{
			return $this->readline($this->separator);
		}
		else
		{
			$found = array();
			$data = $this->readline($this->separator);
			while ($data !== false && $lines > 0)
			{
				array_push($found, $data);
				$data = $this->readline($this->separator);
				$lines--;
			}
			return $found;
		}
	}
	
	protected function readline($separator)
	{
		if ($this->handle === false) $this->openFile();
		$stringdata = fgets($this->handle);
		if (strcmp($this->encoding, 'utf8') != 0)
		{
			$stringdata = utf8_encode($stringdata);
		}
		$stringdata = preg_replace("/^\\s+/", "", $stringdata);
		$stringdata = preg_replace("/\\s+$/", "", $stringdata);
		$data = explode($separator, $stringdata);
		if (is_array($data) && count($data) == 1 && strlen($data[0]) == 0) $data = false;
		if ($data !== false)
		{
			$this->rowcounter++;
		}
		if (is_array($data))
		{
			return $data;
		}
		else
		{
			return false;
		}
	}
	
	protected function openFile()
	{
		if ($this->handle !== false)
		{
			fseek($this->handle, 0);
			$this->rowcounter = 0;
		}
		else
		{
			$this->handle = fopen($this->filename, "r");
		}
	}
	
	protected function closeFile()
	{
		if ($this->handle !== false)
		{
			fclose($this->handle);
		}
		$this->handle = false;
	}
}

?>