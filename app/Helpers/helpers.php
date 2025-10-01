<?php

if (!function_exists('convertNumberToWords')) {
    function convertNumberToWords($number) {
        $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        return ucfirst($f->format($number)) . ' Only';
    }
}
