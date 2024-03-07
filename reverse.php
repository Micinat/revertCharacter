<?php

mb_internal_encoding('UTF-8');

function utf8_strrev($str) {
    preg_match_all('/./us', $str, $ar);

    return implode(array_reverse($ar[0]));//Зеркалим строку

}
function strToTheWords($str)
{
    $words = preg_split('/\s+|(?=\p{P})|(?<=\p{P})/u', $str, -1, PREG_SPLIT_NO_EMPTY);
//Разбиваем строку на отдельные слова
    $func = function ($value) {

        if (preg_match('/[A-ZА-Я]/u', $value)) {
            $wordToLower = mb_strtolower($value, 'UTF-8');
            $wordFirstCharToUpper = mb_strtoupper(mb_substr($wordToLower, 0, 1, 'UTF-8'), 'UTF-8');
            return $wordFirstCharToUpper . mb_substr($wordToLower, 1, null, 'UTF-8');
        } else {
            return $value;
        }//Сохраняем регистр на месте
    };

    $result = array_map($func, $words);

    return  $result;
}
function revertCharacter($str)
{
    $result = '';

    $words = strToTheWords(utf8_strRev($str));

    for ($i = 0; $i < count($words); $i++) {

            $result = $words[$i] . ' ' .  $result;

    }

    echo $result;
    return $result;
}

revertCharacter('Тевирп! Онвад ен ьсиледив.');






