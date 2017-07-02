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

class Csv
{
    // take a CSV line (utf-8 encoded) and returns an array
    // 'string1,string2,"string3","the ""string4"""' => array('string1', 'string2', 'string3', 'the "string4"')
    static public function parseString($string, $separator = ',')
    {
        $values = array();
        $string = str_replace("\r\n", '', $string); // eat the traling new line, if any

        if ($string == '') {
            return $values;
        }

        $tokens = explode($separator, $string);
        $count = count($tokens);

        for ($i = 0; $i < $count; $i++) {
            $token = $tokens[$i];
            $len = strlen($token);
            $newValue = '';
            if ($len > 0 and $token[0] == '"') { // if quoted
                $token = substr($token, 1); // remove leading quote
                do { // concatenate with next token while incomplete
                    $complete = Csv::_hasEndQuote($token);
                    $token = str_replace('""', '"', $token); // unescape escaped quotes
                    $len = strlen($token);
                    if ($complete) { // if complete
                        $newValue .= substr($token, 0, -1); // remove trailing quote
                    } else { // incomplete, get one more token
                        $newValue .= $token;
                        $newValue .= $separator;
                        if ($i == $count - 1) {
                            throw new Exception('Illegal unescaped quote.');
                        }
                        $token = $tokens[++$i];
                    }
                } while (!$complete);

            } else { // unescaped, use token as is
                $newValue .= $token;
            }

            $values[] = $newValue;
        }

        return $values;
    }

    static public function escapeString($string)
    {
        $string = str_replace('"', '""', $string);

        if (strpos($string, '"') !== false or strpos($string, ',') !== false or strpos($string,
                "\r") !== false or strpos($string, "\n") !== false
        ) {
            $string = '"' . $string . '"';
        }

        return $string;
    }

    // checks if a string ends with an unescaped quote
    // 'string"' => true
    // 'string""' => false
    // 'string"""' => true
    static public function _hasEndQuote($token)
    {
        $len = strlen($token);

        if ($len == 0) {
            return false;
        } elseif ($len == 1 and $token == '"') {
            return true;
        } elseif ($len > 1) {
            while ($len > 1 and $token[$len - 1] == '"' and $token[$len - 2] == '"') { // there is an escaped quote at the end
                $len -= 2; // strip the escaped quote at the end
            }

            if ($len == 0) {
                return false;
            } // the string was only some escaped quotes
            elseif ($token[$len - 1] == '"') {
                return true;
            } // the last quote was not escaped
            else {
                return false;
            } // was not ending with an unescaped quote
        }
    }
}
