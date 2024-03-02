<?php

namespace Tests\Unit\Instruction;

use App\Instruction\C;
use PHPUnit\Framework\TestCase;

class CTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $asm
     * @param $binary
     * @return void
     */
    public function testBinary($asm, $binary)
    {
        $this->assertEquals($binary, (new C($asm))->toBinary());
    }

    public function dataProvider(): array
    {
        return [
            ['D=A',     '1110110000010000'],
            ['D=D+A',   '1110000010010000'],
            ['AM=M-1',  '1111110010101000'],
            ['D;JGT',   '1110001100000001'],
            ['0;JMP',   '1110101010000111'],
        ];
    }
}