<?php

use PHPUnit\Framework\TestCase;

class StringManipulationTest extends TestCase
{
    public function testUtf8Strrev()
    {
        $testString = 'Привет мир!';
        $expectedResult = '!рим тевирП';

        $result = utf8_strrev($testString);

        $this->assertEquals($expectedResult, $result);
    }

   public function testStrToTheWords()
    {
        $input = 'Hello, World!';
        $expected = ['Hello,', 'World!'];
        $this->assertEquals($expected, strToTheWords($input));
    }

    public function testRevertCharacter()
    {
        $input = 'Тевирп! Онвад ен ьсиледив';
       $expected = 'Привет! Давно не виделись';
        $this->assertEquals($expected, revertCharacter($input));
    }
}