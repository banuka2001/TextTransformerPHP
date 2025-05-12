<?php
// Text transformation functions
function convertToUpper(string $string) {
    return strtoupper($string);
}
function convertToLower(string $string) {
    return strtolower($string);
}

function trimText(string $string) {
    return trim($string);
}

function padText(string $string, int $length, string $padChar = "0") {
    return str_pad($string, $length, $padChar);
}

function replaceText(string $search, string $replace, string $string) {
    return str_replace($search, $replace, $string);
}

function reverseText(string $string) {
    return strrev($string);
}

function shuffleText(string $string) {
    return str_shuffle($string);
}

function compareText (string $string1, string $string2) {
     $result = strcmp($string1, $string2);
 
        if ($result === 0) return "Strings are identical.";
         elseif ($result < 0) return "Input is less than the comparison string.";
            else return "Input is greater than the comparison string.";
}

function getStringLength(string $string) {
    return strlen($string);
}

function findSubStringPosition(string $string, string $substring) {
    $position = strrpos($string, $substring);
    return ($position !== false) ? $position : "Substring not found"; 
}

function extractSubString(string $string, $start = 0, $length = null) {
    return ($length !== null) ? substr($string, $start, $length) :substr($string, $start);
}

function explodeText(string $string, $delimiter = " ") {
    return explode($delimiter, $string);
}

function implodeText($array, $join = " ") {
    return implode($join, $array);
}




?>