<?php

namespace Tests\Unit;

use App\InstructionTranslator;
use PHPUnit\Framework\TestCase;
class InstructionTranslatorTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $asm
     * @param $binary
     * @return void
     */
    public function testToBinary($asm, $binary)
    {
        $this->assertEquals($binary, (new InstructionTranslator())->toBinary($asm));
    }

    public function dataProvider(): array
    {
        return [
            ['@0',      '0000000000000000'],
            ['@1',      '0000000000000001'],
            ['@10',     '0000000000001010'],
            ['@16',     '0000000000010000'],
            ['@100',    '0000000001100100'],
            ['D=A',     '1110110000010000'],
            ['D=D+A',   '1110000010010000'],
            ['AM=M-1',  '1111110010101000'],
            ['D;JGT',   '1110001100000001'],
            ['0;JMP',   '1110101010000111'],
        ];
    }
}