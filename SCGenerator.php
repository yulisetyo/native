<?php
/*
     *
     * Wed, Jan 22 - 2014, 06.00 WIB. Malang - Indonesia
     * coder haripinter - hari\at/elangsakti.com
     * String Combination Generator v0.1
     * 
     * $Format : format string
     *           ex. xxx => all string will combine
     *               xx4 => all string combine except 4, 4 is default value
     *
     * $Chars : list of character to generate
     *           ex. '0123456789' or 'abcde... etc'
     * 
     * $Result : the result
     */
class SCGenerator
{
    var $Result;
    var $Format;
    var $Chars;

    function setFormat($str)
    {
        $this->Format = $str;
    }

    function setChars($str)
    {
        $this->Chars = $str;
    }

    function Generate()
    {
        $chars = $this->Chars;
        $format = $this->Format;

        $formatlen = strlen($this->Format);
        $charlen = strlen($chars);

        if ($formatlen < 1 or $charlen < 1) {
            echo "You must define both Chars and Format first!";
            exit();
        }

        $pis = array();
        for ($a = 0; $a < $formatlen; $a++) {
            $pis[$a] = 0;
        }

        $result = array();
        $loop = false;
        do {
            $tmp = '';
            $xyz = true;
            for ($x = 0; $x < $formatlen; $x++) {
                if ($chars[$pis[$x]] == '') {
                    $tmp .= $chars[0];
                } else {
                    if (strtolower($format[$x]) != 'x') {
                        $tmp .= $format[$x];
                    } else {
                        $tmp .= $chars[$pis[$x]];
                    }
                }
                $xyz = (($chars[$pis[$x]] == $chars[$charlen]) && $xyz);
                $loop = $xyz;
                if ($chars[$pis[$x]] == $chars[$charlen]) {
                    $pis[$x + 1]++;
                    $pis[$x] = 0;
                }
                if ($x == 0) {
                    $pis[$x]++;
                }
            }
            if (!$xyz) {
                $result[$tmp] = $tmp;
            }
        } while (!$loop);

        $tmx = array();
        foreach ($result as $res) {
            array_push($tmx, $res);
        }
        $this->Result = $tmx;
        return $tmx;
    }
}
